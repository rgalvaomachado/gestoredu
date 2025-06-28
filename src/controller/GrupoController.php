<?php
    class GrupoController {
        function buscarTodos(){
            $Grupo = new Grupo();
            $grupos = $Grupo->read();
            return json_encode([
                "access" => true,
                "grupos" => $grupos
            ]);
        }

        function buscar($post){
            $Grupo = new Grupo();
            $buscarGrupo = $Grupo->readFirst([
                'id' => $post['id']
            ]);

            if(!empty($buscarGrupo)){
                return json_encode([
                    "access" => true,
                    "grupo" => $buscarGrupo,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Grupo não encontrado"
                ]);
            }
        }

        function criar($post){
            $grupo = new Grupo();
            $id = $grupo->create([
                'nome' => $post['nome']
            ]);
            if ($id > 0){
                return json_encode([
                    "access" => true,
                    "message" => "Criado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro no cadastro"
                ]);
            }
            
        }

        function editar($post){
            $grupo = new Grupo();
            $id = $grupo->update([
                    'nome' => $post['nome']
                ],
                [
                    'id' => $post['id'],
                ]
            );
            if ($id > 0) {
                return json_encode([
                    "access" => true,
                    "message" => "Editado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro na edição"
                ]);
            }
        }

        function deletar($post){
            $grupo = new Grupo();
            $deletado = $grupo->delete([
                'id' => $post['id']
            ]);
            if ($deletado){
                return json_encode([
                    "access" => true,
                    "message" => "Deletado com sucesso"
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Erro na exclusão"
                ]);
            }  
        }
    }
?>