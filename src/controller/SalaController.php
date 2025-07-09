<?php
    class SalaController {
        function buscarTodos(){
            $Sala = new Sala();
            $Salas = $Sala->searchAll();
            return json_encode([
                "access" => true,
                "salas" => $Salas
            ]);
        }

        function buscar($post){
            $Sala = new Sala();
            $buscarSala = $Sala->search([
                'id' => $post['id']
            ]);

            $SalaDisciplina = new SalaDisciplina();
            $SalaDisciplina->cod_sala = $post['id'];
            $disciplinas = $SalaDisciplina->buscar();
            $buscarSala['disciplinas'] = $disciplinas;

            $Inscricao = new Inscricao();
            $Inscricao->cod_sala = $post['id'];
            $inscricoes = $Inscricao->buscar();
            $buscarSala['inscricoes'] = $inscricoes;

            if(!empty($buscarSala)){
                return json_encode([
                    "access" => true,
                    "sala" => $buscarSala,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Sala não encontrado"
                ]);
            }
        }

        function criar($post){
            $Sala = new Sala();
            $id = $Sala->create([
                'nome' => $post['nome']
            ]);

            if(!empty($post['disciplinas'])){
                $SalaDisciplina = new SalaDisciplina();
                $SalaDisciplina->cod_sala = $id;
                $SalaDisciplina->vinculo($post['disciplinas']);
            }
     

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
            $Sala = new Sala();
            $atualizado = $Sala->update(
                [
                    'nome' => $post['nome']
                ],
                [
                    'id' => $post['id']
                ]
            );

            $SalaDisciplina = new SalaDisciplina();
            $SalaDisciplina->cod_sala = $post['id'];
            $vinculado = $SalaDisciplina->vinculo($post['disciplinas']);

            $atualizado+= $vinculado;

            if ($atualizado > 0) {
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
            $Sala = new Sala();
            $deletado = $Sala->delete([
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