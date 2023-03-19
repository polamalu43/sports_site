<?php

namespace App\Libraries\Api;

class ProductApiWithCurl
{
    private object $curl;
    private array $options;
    private string $url;
    private string $return_transfer;
    private string $ssl_verifypeer;
    private string $custom_request;
    private array $body;

    public function __construct()
    {
        $this->curl = curl_init();
        $this->options = [];
        $this->url = '';
        $this->custom_request = 'GET';
        $this->return_transfer = true;
        $this->ssl_verifypeer = false;
        $this->body = [];
    }

    public function getResponseData(): object | array
    {
      if (!empty($this->body)) {
        if ($this->custom_request === 'POST') {
          curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($this->body));
        } else if ($this->custom_request === 'GET') {
          $this->url = $this->url. '?'. http_build_query($this->body);
        }
      }

      $this->setHeaderOptions();
      curl_setopt_array($this->curl, $this->options);
      $response = curl_exec($this->curl);
      curl_close($this->curl);
      $data = json_decode($response);

      return $data;
    }

    private function setHeaderOptions(): void
    {
      $this->options = [
        CURLOPT_URL => $this->url,
        CURLOPT_CUSTOMREQUEST => $this->custom_request,
        CURLOPT_RETURNTRANSFER => (bool)$this->return_transfer,
        CURLOPT_SSL_VERIFYPEER => (bool)$this->ssl_verifypeer,
      ];
    }

    public function setUrl(string $url): void
    {
      $this->url = $url;
    }

    public function setReturntransfer(string $return_transfer): void
    {
      $this->return_transfer = $return_transfer;
    }

    public function setSslVerifypeer(string $ssl_verifypeer): void
    {
      $this->ssl_verifypeer = $ssl_verifypeer;
    }

    public function setCustomRequest(string $custom_request): void
    {
      $this->custom_request = $custom_request;
    }

    public function setBody(array $body): void
    {
      $this->body = $body;
    }
}
