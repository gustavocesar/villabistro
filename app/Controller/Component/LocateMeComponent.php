<?php

App::uses('Component', 'Controller');

/**
 * Created by PhpStorm.
 * User: Ederlo Rodrigo de Oliveira
 * Date: 14/12/15
 * Time: 09:49
 */
class LocateMeComponent extends Component {

    public $url = 'http://cep.correiocontrol.com.br';
    public $url2 = 'https://viacep.com.br/ws';
    public $type = 'json';

    /**
     * @param int $cep
     * @return mixed
     */
    public function cep($cep = 0) {
        try {
            $cep = filter_var($cep, FILTER_SANITIZE_NUMBER_INT);
            @$json = file_get_contents("{$this->url2}/{$cep}/{$this->type}");
            return json_decode($json, true);
        } catch (Exception $e) {
            $cep = filter_var($cep, FILTER_SANITIZE_NUMBER_INT);
            $json = file_get_contents("{$this->url}/{$cep}.{$this->type}");
            return json_decode($json, true);
        } catch (Exception $e) {
            return json_decode(['json' => '']);
        }
    }

}
