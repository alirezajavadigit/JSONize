<?php

namespace JSONize\System\Traits;

trait HasAttribute
{
    private ?string $message = null;

    private ?string $statusMessage = null;

    private ?string $dataKey = "data";

    private mixed $data = null;

    private int $status = 200;

    private array $headers = [
        "Access-Control-Allow-Origin" => "*",
        "Access-Control-Allow-Methods" => "GET, POST, OPTIONS",
        "Access-Control-Allow-Headers" => "Content-Type, Authorization",
        "Content-Type" => "application/json",
    ];

    private bool $hideStatus = false;

    private bool $hideData = false;

    private bool $hideMessage = false;

    private bool $hideSuccess = false;

    public function setMessage(string $message): static
    {
        $this->message = $message;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function getDataKey(): ?string
    {
        return $this->dataKey;
    }

    public function setData(mixed $data, string $key = "data"): static
    {
        $this->data = $data;
        $this->dataKey = $key;
        return $this;
    }

    public function getData(): mixed
    {
        return $this->data;
    }

    public function getStatusMessage(): ?string
    {
        return $this->statusMessage;
    }

    public function setStatus(int $status, string $message = ""): static
    {
        $this->status = $status;
        $this->statusMessage = $message !== "" ? $message : null;
        return $this;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setHeaders(array $headers): static
    {
        $this->headers = array_merge($this->headers, $headers);
        return $this;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getHideStatus(): bool
    {
        return $this->hideStatus;
    }

    public function setHideStatus(): static
    {
        $this->hideStatus = true;
        return $this;
    }

    public function getHideData(): bool
    {
        return $this->hideData;
    }

    public function setHideData(): static
    {
        $this->hideData = true;
        return $this;
    }

    public function getHideMessage(): bool
    {
        return $this->hideMessage;
    }

    public function setHideMessage(): static
    {
        $this->hideMessage = true;
        return $this;
    }

    public function getHideSuccess(): bool
    {
        return $this->hideSuccess;
    }

    public function setHideSuccess(): static
    {
        $this->hideSuccess = true;
        return $this;
    }

    public function setError(string $error, int $status = 500): static
    {
        $this->message = $error;
        $this->status = $status;
        return $this;
    }
}
