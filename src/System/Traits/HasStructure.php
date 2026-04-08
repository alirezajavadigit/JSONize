<?php

namespace JSONize\System\Traits;

trait HasStructure
{
    private function extractHeaders(): void
    {
        foreach ($this->headers as $key => $value) {
            header("$key: $value");
        }
    }

    private function makeReturnableJson(): string
    {
        $result = [];

        $statusCode = $this->getStatus();
        $result["success"] = ($statusCode >= 200 && $statusCode < 300);

        $message = $this->getMessage();
        if ($message !== null) {
            $result["message"] = $message;
        }

        $data = $this->getData();
        $dataKey = $this->getDataKey();

        if ($data !== null) {
            $key = (!empty($dataKey)) ? $dataKey : "data";
            $result[$key] = $data;
        } else {
            $key = (!empty($dataKey)) ? $dataKey : "data";
            $result[$key] = null;
        }

        $statusMessage = $this->getStatusMessage();
        if ($statusMessage !== null) {
            $result["status"] = [$statusCode, $statusMessage];
        } else {
            $result["status"] = $this->getHttpStatus($statusCode);
        }

        if ($this->getHideSuccess()) {
            unset($result["success"]);
        }
        if ($this->getHideMessage()) {
            unset($result["message"]);
        }
        if ($this->getHideData()) {
            $key = (!empty($dataKey)) ? $dataKey : "data";
            unset($result[$key]);
        }
        if ($this->getHideStatus()) {
            unset($result["status"]);
        }

        http_response_code($statusCode);

        return json_encode($result);
    }
}
