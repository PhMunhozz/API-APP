<?

// define base url
define('API_BASE', 'http://localhost/api/?option=');

echo '<h3>APPLICATION</h3><hr>';

// request loop
for($i = 0; $i < 10; $i++){
    $result = api_request('random&min=100&max=200');
    
    // verify if response is ok (success)
    if($result['status'] == 'ERROR'){
        die('Requisition failed');
    }

    echo "Random number: " . $result['data'] . '<br>';
}
echo "End of random numbers";

// echo '<pre>';
// print_r($result);


// functions

// api request
function api_request($option){
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    curl_close($client);
    return json_decode($response, true);
}