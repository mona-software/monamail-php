<?php
declare(strict_types=1);
namespace MonaMail;
class Inboxes extends Resource
{
    public function create(array $body, ?string $idempotencyKey = null): mixed
    { return $this->call('POST', '', $body, [], $idempotencyKey); }
    public function list(): mixed
    { return $this->call('GET'); }
    public function get(string $id): mixed
    { return $this->call('GET', '/' . rawurlencode($id)); }
    public function remove(string $id): mixed
    { return $this->call('DELETE', '/' . rawurlencode($id)); }
    public function messages(string $id, array $query = []): mixed
    { return $this->call('GET', '/' . rawurlencode($id) . '/messages', null, $query); }
    public function message(string $id, string $messageId): mixed
    { return $this->call('GET', '/' . rawurlencode($id) . '/messages/' . rawurlencode($messageId)); }
    public function reply(string $id, string $messageId, array $body, ?string $idempotencyKey = null): mixed
    { return $this->call('POST', '/' . rawurlencode($id) . '/messages/' . rawurlencode($messageId) . '/reply', $body, [], $idempotencyKey); }
    public function wait(string $id, array $query): mixed
    { return $this->call('GET', '/' . rawurlencode($id) . '/wait', null, $query); }
}
