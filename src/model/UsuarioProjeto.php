<?php
    class UsuarioProjeto extends Database{
        protected $table = 'usuario_projeto';

        public $id;
        public $cod_usuario;
        public $cod_projeto;

        function buscar(){
            
            $sql = "
                SELECT usuario_projeto.cod_projeto as cod_projeto, projeto.nome as nome_projeto, usuario.nome as nome_usuario
                FROM usuario_projeto
                INNER JOIN usuario ON usuario_projeto.cod_usuario = usuario.id
                INNER JOIN projeto ON usuario_projeto.cod_projeto = projeto.id
                WHERE usuario.id = :cod_usuario
            ";
            $buscar = $this->connection->prepare($sql);
            $buscar->execute([
                ':cod_usuario' => $this->cod_usuario
            ]);
            return $buscar->fetch(PDO::FETCH_ASSOC);
        }

        function vinculo($projetos){
            $vinculo = 0;

            foreach ($projetos as $projeto) {
                $buscar = $this->read([
                    'cod_usuario' => $this->cod_usuario,
                    'cod_projeto' => $projeto->cod_projeto,
                ]);
                if (!$buscar) {
                    $this->create([
                        'cod_usuario' => $this->cod_usuario,
                        'cod_projeto' => $projeto->cod_projeto,
                    ]);
                    $vinculo++;
                }
            }

            $existentes = $this->read([
                'cod_usuario' => $this->cod_usuario
            ]);
            foreach ($existentes as $existe) {
                $encontrado = false;
                foreach ($projetos as $projeto) {
                    if (
                        $existe['cod_usuario'] == $this->cod_usuario &&
                        $existe['cod_projeto'] == $projeto->cod_projeto
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