<?php

namespace app\Http\Helpers\RequestSender;

class RequestSenderHelper {
    public function get($link, $token = null) {
        $headers = array(
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        );
        $options = array(
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true
        );

        $ch = curl_init($link);
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function post($link, $token = null, $body = null) {
        $headers = array(
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        );
        $options = array(
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($body)
        );

        $ch = curl_init($link);
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function patch($link, $token = null, $body = null) {
        $headers = array(
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        );
        $options = array(
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'PATCH',
            CURLOPT_POSTFIELDS => json_encode($body)
        );

        $ch = curl_init($link);
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    public function delete($link, $token = null) {
        $headers = array(
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        );
        $options = array(
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'DELETE'
        );

        $ch = curl_init($link);
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
