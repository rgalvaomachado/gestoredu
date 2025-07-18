<?php
    class CertificadoController {

        function buscarTodos(){
            $Certificado = new Certificado();
            $Certificados = $Certificado->buscarTodos();
            return json_encode([
                "access" => true,
                "certificados" => $Certificados
            ]);
        }

        function buscar($post){
            $Certificado = new Certificado();
            $certificado = $Certificado->buscar([
                'id' => $post['id']
            ]);

            if(!empty($certificado)){
                return json_encode([
                    "access" => true,
                    "certificado" => $certificado,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Certificado não encontrado"
                ]);
            }
        }

        function buscarCerificadoFrequencia($post){
            $Certificado = new Certificado();
            $certificado = $Certificado->search([
                'cod_sala' => $post['cod_sala'],
                'cod_disciplina' => $post['cod_disciplina']
            ]);

            if(!empty($certificado)){
                return json_encode([
                    "access" => true,
                    "certificado" => $certificado,
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "message" => "Certificado não encontrado"
                ]);
            }
        }

        function criar($post){
            $Certificado = new Certificado();
            $id = $Certificado->create([
                "cod_grupo" => $post['grupo'],
                "cod_sala" => $post['sala'],
                "cod_disciplina" => $post['disciplina'],
                "conteudo" => $post['conteudo'],
                "tamanho_letra" => $post['tamanho_letra']
            ]);

            $path = $_ENV['DIRECTORY_STORAGE'] . 'certificados/' . $id . '.png';

            $file = $post['file'];
            $file = preg_replace('#^data:image/\w+;base64,#i', '', $file);
            $fileData = base64_decode($file);
            
            $directory = dirname($path);
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }
            file_put_contents($path, $fileData);

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
            $Certificado = new Certificado();
            $atualizado = $Certificado->update(
                [
                    "cod_grupo" => $post['grupo'],
                    "cod_sala" => $post['sala'],
                    "cod_disciplina" => $post['disciplina'],
                    "conteudo" => $post['conteudo'],
                    "tamanho_letra" => $post['tamanho_letra']
                ],
                [
                    'id' => $post['id']
                ]
            );

            $path = $_SERVER['DOCUMENT_ROOT'] . "/" . $_ENV['DIRECTORY_STORAGE'] . 'certificados/' . $post['id'] . '.png';

            if (isset($post['file'])) {
                $file = $post['file'];
                $file = preg_replace('#^data:image/\w+;base64,#i', '', $file);
                $fileData = base64_decode($file);

                $directory = dirname($path);
                if (!is_dir($directory)) {
                    mkdir($directory, 0755, true);
                }
                file_put_contents($path, $fileData);
            }

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
            $Certificado = new Certificado();
            $deletado = $Certificado->delete([
                'id' => $post['id']
            ]);
            $path = $_SERVER['DOCUMENT_ROOT'] . "/" . $_ENV['DIRECTORY_STORAGE'] . 'certificados/' . $post['id'] . '.png';
            unlink($path);

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

        public function gerarCertificado($post){
            $Certificado = new Certificado();
            $certificado = $Certificado->search([
                'cod_grupo' => $post['cod_grupo'],
                'cod_sala' => $post['cod_sala'],
                'cod_disciplina' => $post['cod_disciplina']
            ]);

            if ($certificado){
                $UsuarioController = new UsuarioController();
                $UsuarioController = json_decode($UsuarioController->buscar(['id' => $post["cod_usuario"]]));
                $usuario = $UsuarioController->usuario;

                $ProjetoController = new ProjetoController();
                $ProjetoController = json_decode($ProjetoController->buscarProjeto([
                    'cod_usuario' => $post["cod_usuario"],
                    'cod_disciplina' => $post["cod_disciplina"],
                    'cod_sala' => $post["cod_sala"]
                ]));
                $projeto = $ProjetoController->projeto ?? "";

                $titulo_projeto = $projeto ? $projeto->nome : "";

                $image_path = $_SERVER['DOCUMENT_ROOT'] . "/" . $_ENV['DIRECTORY_STORAGE'] . 'certificados/' . $certificado['id'] . '.png';

                $image = imagecreatefrompng($image_path);
            
                $font_path = $_SERVER['DOCUMENT_ROOT'] . '/public/fonts/Arial/arial.ttf';

                $text = $certificado["conteudo"];

                $text = str_replace("%nome%", $usuario->nome, $text);
                $text = str_replace("%frequencia%", $post["frequencia"]."%", $text);
                $text = str_replace("%projeto%", $titulo_projeto, $text);

                $font_size = isset($certificado["tamanho_letra"]) ? $certificado["tamanho_letra"] : 50;

                if (!$image) {
                    die("Falha ao carregar a imagem.");
                }

                $image_width = imagesx($image);
                
                // Defina a cor do texto (preto)
                $text_color = imagecolorallocate($image, 0, 0, 0);
                
                // Define o padding
                $padding = 400;
                $padding_top = 700;

                // Divide o texto em linhas
                $lines = $this->wrapText($font_size, $font_path, $text, $image_width - 2 * $padding); // Subtraia o padding

                // Calcula a altura total do texto
                $total_text_height = 0;
                $line_heights = [];
                foreach ($lines as $line) {
                    $bbox = imagettfbbox($font_size, 0, $font_path, $line);
                    $line_height = $bbox[1] - $bbox[7];
                    $line_heights[] = $line_height;
                    $total_text_height += $line_height;
                }

                // Adiciona cada linha de texto à imagem
                $y = $padding_top;
                foreach ($lines as $index => $line) {
                    $bbox = imagettfbbox($font_size, 0, $font_path, $line);
                    $text_width = $bbox[2] - $bbox[0];
                    $line_height = array_shift($line_heights);
                    $x = $padding; // Define o início da linha com padding
                    $y -= $bbox[7]; // Ajusta a posição y considerando o baseline da fonte

                    // Justifica todas as linhas, exceto a última
                    if ($index < count($lines) - 1) {
                        $this->drawJustifiedText($image, $font_size, $font_path, $line, $padding, $y, $text_color, $image_width - 2 * $padding);
                    } else {
                        // Centraliza a última linha
                        $x = ($image_width - $text_width) / 2;
                        imagettftext($image, $font_size, 0, (int)$x, (int)$y, $text_color, $font_path, $line);
                    }
                    $y += $line_height; // Move y para a próxima linha
                }

                ob_start();  
                imagepng($image);
                $imagedata = ob_get_clean();
                
                $base64_img     = str_replace('data:image/png;base64,', '', base64_encode($imagedata));
                $base64_img     = str_replace(' ', '+', $base64_img);
                $data           = base64_decode($base64_img);
                $path_tmp =  $_ENV['DIRECTORY_TMP'].$post["cod_usuario"].'.png';
                file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/" . $path_tmp, $data);

                return json_encode([
                    "access" => true,
                    "path" => $_ENV['BASE_URL'] . "/" . $path_tmp
                ]);
            } else {
                return json_encode([
                    "access" => false,
                    "path" => "Certificado não encontrado"
                ]);
            }
        }

        // Função para dividir o texto em linhas que caibam na imagem
        function wrapText($font_size, $font_path, $text, $max_width) {
            $words = explode(' ', $text);
            $lines = [];
            $line = '';
            
            foreach ($words as $word) {
                $test_line = $line . ' ' . $word;
                $box = imagettfbbox($font_size, 0, $font_path, trim($test_line));
                $line_width = $box[2] - $box[0];
                if ($line_width > $max_width && !empty($line)) {
                    $lines[] = trim($line);
                    $line = $word;
                } else {
                    $line = $test_line;
                }
            }
            $lines[] = trim($line);
            return $lines;
        }

        // Função para desenhar texto justificado
        function drawJustifiedText($image, $font_size, $font_path, $line, $x, $y, $color, $max_width) {
            $words = explode(' ', $line);
            $num_words = count($words);
            if ($num_words == 1) {
                imagettftext($image, $font_size, 0, $x, $y, $color, $font_path, $line);
                return;
            }

            // Calcula a largura total das palavras
            $total_words_width = 0;
            foreach ($words as $word) {
                $box = imagettfbbox($font_size, 0, $font_path, $word);
                $total_words_width += $box[2] - $box[0];
            }

            // Calcula o espaço entre as palavras
            $total_space_width = $max_width - $total_words_width;
            $space_width = $total_space_width / ($num_words - 1);

            // Desenha cada palavra com o espaço calculado
            $current_x = $x;
            foreach ($words as $word) {
                imagettftext($image, $font_size, 0, (int)$current_x, (int)$y, $color, $font_path, $word);
                $box = imagettfbbox($font_size, 0, $font_path, $word);
                $word_width = $box[2] - $box[0];
                $current_x += $word_width + $space_width;
            }
        }
    }
?>