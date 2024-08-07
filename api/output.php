<?

// FUNCTIONS FOR ENDPOINTS

// api status
function api_status(&$data) {
    define_response($data, 'API ok');
}

// api random
function api_random(&$data) {
    // default values
    $min = 0;
    $max = 1000;

    // verify if request is sending min and max values  
    if(isset($_GET['min'])) $min = intval($_GET['min']);
    if(isset($_GET['max'])) $max = intval($_GET['max']);

    if($min > $max) {
        response($data);
        return;
    }

    define_response($data, rand($min, $max));
}

// api hash
function api_hash(&$data) {
    define_response($data, md5(sha1(uniqid())));
}

// ======================================================================================================

// PATTERN FUNCTIONS

// define response
function define_response(&$data, $value) {
    $data['status'] = 'SUCCESS';
    $data['data'] = $value;
}

// response construction
function response($data_response) {
    header('Content-Type: application/json');
    echo json_encode($data_response);
}