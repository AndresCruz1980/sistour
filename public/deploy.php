<?php
// (Opcional) Secreto compartido para verificar la autenticidad del webhook
$secret = 'Addconsulta2020'; // Este valor debes poner igual en GitHub al crear el webhook

// Capturar el contenido y verificar firma
$headers = getallheaders();
$payload = file_get_contents('php://input');

// Validar firma (si se define un secret)
if (!empty($secret) && isset($headers['X-Hub-Signature-256'])) {
    $hash = 'sha256=' . hash_hmac('sha256', $payload, $secret);
    if (!hash_equals($headers['X-Hub-Signature-256'], $hash)) {
        http_response_code(403);
        echo "🚫 Firma inválida.";
        exit;
    }
}

// Ejecutar git pull
$cmd = 'cd /home/tu_usuario/public_html/sistour.tupizatours.com && git pull origin main 2>&1';
$output = shell_exec($cmd);

// Mostrar salida para debug
echo "<pre>$output</pre>";
?>
