<?php

namespace App\Domain\Cases;

use App\Domain\Enties\Ramal;
use App\Domain\Cases\Contracts\HandleRamalInterface;

class HandleRamal implements HandleRamalInterface {

    private array $statusFilas;
    private array $statusRamais;

    public function handle($dirFila, $dirRamal){

        $this->handleFilas($dirFila);
        $this->handleRamais($dirRamal);

        if ($this->statusFilas && $this->statusRamais) {
            return $this->statusRamais;
        }

    }
        private function handleFilas($dirFila)
        {
            foreach ($dirFila as $linhas) {
                if (strstr($linhas, 'SIP/')) {
                    if (strstr($linhas, '(Ring)')) {
                        $this->statusFilas[$this->getRamal($linhas)] = array('status' => 'chamando');
                    } elseif (strstr($linhas, '(In use)')) {
                        $this->statusFilas[$this->getRamal($linhas)] = array('status' => 'ocupado');
                    } elseif (strstr($linhas, '(Not in use)')) {
                        $this->statusFilas[$this->getRamal($linhas)] = array('status' => 'disponivel');
                    } elseif (strstr($linhas, '(Unavailable)')) {
                        $this->statusFilas[$this->getRamal($linhas)] = array('status' => 'indisponivel');
                    }

                    $this->statusFilas[$this->getRamal($linhas) . 'nome'] = array('nome' => $this->getNome($linhas));
                    $this->statusFilas[$this->getRamal($linhas) . 'historico'] = array('historico' => $this->getHistorico($linhas));
                }
            }
        }
        private function handleRamais($dirRamal){
            foreach ($dirRamal as $linhas){
            $linha = array_filter(explode('', $linhas));
            $array = array_values($linhas);
            if ((trim($array[0]) !== "Nome(UserName)" ) && (trim($array[1]) !== "sip")){
                list($ramal, $nome) = explode('/', $array[0]);
                $this->statusRamais[$ramal] = new Ramal(
                    $ramal,
                    $nome,
                    $this->statusFilas[$ramal]['status'],
                    $this->statusFilas[$ramal . 'nome']['nome'],
                    $this->statusFilas[$ramal . 'historico']['historico']
                );
            }
        }
    }

    private function getRamal($linhas)
  {
    $linha = explode(' ', trim($linhas));
    $explode = explode('/', $linha[0]);
    return  $explode[1];
  }

  private function getNome(){

  }

   private function getHistorico($linhas)
  {
    $array = explode(' ', trim($linhas));
    $res = array_search('calls', $array);
    return $array[$res - 1] == 'no' ? 0 : (int)$array[$res - 1];
  }

}

