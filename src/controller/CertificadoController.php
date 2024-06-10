<?php
include_once('PresencaController.php');
include_once('SalaController.php');
include_once('UtilsController.php');

class CertificadoController{
    public function gerarCertificado($post){
        $image_path = $_ENV['DIRECTORY_STORAGE'].'certificado_bga.png';
        $image = imagecreatefrompng($image_path);
    
        $font_path = '/public/fonts/Arial/arial.ttf';

        $disciplina = $post['disciplina'];

        switch ($disciplina) {
            case 1:
                $text = "Certifico que %nome% participou do Simpósio Anual do Programa de Pós Graduação em Biologia Geral e Aplicada, do Instituto de Biociências de Botucatu - UNESP, realizado entre os dias 20 e 21/05/2024 em Botucatu, São Paulo, na qualidade de ouvinte, com carga horária de 30 horas.";
                break;
            
            case 2:
                $text = "Certifico que o trabalho intitulado: %projeto% de autoria de %nome% foi apresentado no Simpósio Anual do Programa de Pós Graduação em Biologia Geral e Aplicada, do Instituto de Biociências de Botucatu - UNESP, realizado entre os dias 20 e 21/05/2024 em Botucatu, São Paulo.";
                break;
            
            case 3:
                $text = "Certifico que %nome% participou do Simpósio Anual do Programa de Pós Graduação em Biologia Geral e Aplicada, do Instituto de Biociências de Botucatu - UNESP, realizado entre os dias 20 e 21/05/2024 em Botucatu, São Paulo, na qualidade de membro da comissão organizadora, com carga horária de 30 horas.";
                break;

            case 4:
                $text = "Certifico que %nome% participou do Simpósio Anual do Programa de Pós Graduação em Biologia Geral e Aplicada, do Instituto de Biociências de Botucatu - UNESP, realizado entre os dias 20 e 21/05/2024 em Botucatu, São Paulo, na qualidade de avaliador dos trabalhos apresentados.";
                break;
                    
            default:
                $text = "Texto não encontrado";
                break;
        }

        $text = str_replace("%nome%", $post['nome'], $text);
        $text = str_replace("%disciplina%", $post["disciplina"], $text);
        $text = str_replace("%projeto%", $post["projeto"], $text);

        $font_size = 70;

        if (!$image) {
            die("Falha ao carregar a imagem.");
        }

        $image_width = imagesx($image);
        
        // Defina a cor do texto (preto)
        $text_color = imagecolorallocate($image, 0, 0, 0);
        
        // Define o padding
        $padding = 400;  // Padding lateral
        $padding_top = 800;  // Padding superior definido pelo usuário

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
        $path_tmp = $_ENV['DIRECTORY_TMP'].$post["id"].'.png';
        file_put_contents($path_tmp, $data);

        return json_encode([
            "access" => true,
            "path" => $path_tmp
        ]);
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