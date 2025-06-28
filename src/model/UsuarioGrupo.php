<?php
    class UsuarioGrupo extends Model{
        protected $table = 'usuario_grupo';

        public $id;
        public $cod_usuario;
        public $cod_grupo;

        function vinculo($grupos){
            $vinculo = 0;
            foreach ($grupos as $grupo) {
                $buscar = $this->searchAll([
                    'cod_usuario' => $this->cod_usuario,
                    'cod_grupo' => $grupo->cod_grupo,
                ]);
                if (!$buscar) {
                    $this->create([
                        'cod_usuario' => $this->cod_usuario,
                        'cod_grupo' => $grupo->cod_grupo,
                    ]);
                    $vinculo++;
                }
            }

            $existentes = $this->searchAll([
                'cod_usuario' => $this->cod_usuario
            ]);
            foreach ($existentes as $existe) {
                $encontrado = false;
                foreach ($grupos as $grupo) {
                    if (
                        $existe['cod_usuario'] == $this->cod_usuario &&
                        $existe['cod_grupo'] == $grupo->cod_grupo
                    ) {
                        $encontrado = true;
                        break;
                    }
                }
        
                if (!$encontrado) {
                    $this->delete($existe);
                    $vinculo++;
                }
            }

            return $vinculo;
        }
    }
?>