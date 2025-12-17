<?php

namespace App\Services\Log;

use App\Enums\Log\LogTypeEnum;
use App\Services\BaseGlobalService;

class LogService extends BaseGlobalService
{
    private string $selectedChannel = LogTypeEnum::DEBUG->value;
    private string $message = 'Unhandled exception';
    private array $context = [];

    public static function getInstance(): static
    {
        return new static();
    }

    public function withInfoChannel(): static
    {
        $this->selectedChannel = LogTypeEnum::INFO->value;

        return $this;
    }

    public function withWarningChannel(): static
    {
        $this->selectedChannel = LogTypeEnum::WARNING->value;

        return $this;
    }

    public function withErrorChannel(): static
    {
        $this->selectedChannel = LogTypeEnum::ERROR->value;

        return $this;
    }

    public function withDebugChannel(): static
    {
        $this->selectedChannel = LogTypeEnum::DEBUG->value;

        return $this;
    }

    public function withMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function withContext(array $context): static
    {
        $this->context = $context;

        return $this;
    }

    public function log(): void
    {
        logger()->channel($this->selectedChannel)
            ->{$this->selectedChannel}(
                $this->message,
                array_merge($this->getDefaultContext(), $this->context)
            );
    }

    private function getDefaultContext(): array
    {
        return [
            'user_id' => auth()->id(),
            'url' => request()->fullUrl(),
            'ip' => request()->ip(),
            'env' => app()->environment()
        ];
    }
}
