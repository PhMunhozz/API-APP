<?

define('API_BASE', 'http://localhost/api/?option=');

echo '<h3>APLICAÇÃO</h3><hr>';
$result = api_request('status');
echo '<pre>';
print_r($result);

function api_request($option){
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    curl_close($client);
    return json_decode($response, true);
}