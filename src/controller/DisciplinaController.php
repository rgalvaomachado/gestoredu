<?php
    class DisciplinaController {
        function buscarTodos(){
            $Disciplina = new Disciplina();
            $Disciplinas = $Disciplina->read();
            return json_encode([
                "access" => true,
                "disciplinas" => $Disciplinas
            ]);
        }

        function buscar($post){
            $Disciplina = new Disciplina();
            $buscarDisciplina = $Disciplina->readFirst([
                'id' => $post['id']
            ]);

            $Matricula = new Matricula();
            $Matricula->cod_disciplina = $post['id'];
            $matriculas = $Matricula->buscar();
            $buscarDisciplina['matriculas'] = $matriculas;

            $Atribuicao = new Atribuicao();
            $Atribuicao->cod_disciplina = $post['id'];
            $atribuicoes = $Atribuicao->buscar();
            $buscarDisciplina['atribuicoes'] = $atribuicoes;

            if(!empty($buscarDisciplina)){
                return json_encode([
                    "access" => true,
                    "disciplina" => $buscarDisciplina,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Disciplina não encontrado"
                ]);
            }
        }

        function criar($post){
            $Disciplina = new Disciplina();
            $id = $Disciplina->create([
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
            $Disciplina = new Disciplina();
            $atualizado = $Disciplina->update([
                    'nome' => $post['nome']
                ],
                [
                    'id' => $post['id'],
                ]
            );
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
            $Disciplina = new Disciplina();
            $deletado = $Disciplina->delete([
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