<?

// prepare response
$data['status'] = 'ERROR';
$data['data'] = null;

// check request
if(isset($_GET['option'])){
    
    switch ($_GET['option']) {
        case 'status':
            define_response($data, 'API running OK!');
            break;

        case 'random':
            define_response($data, rand(0, 1000));
            break;
    }
}

// send API response
response($data);


// functions

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