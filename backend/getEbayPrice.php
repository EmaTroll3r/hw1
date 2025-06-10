<?php
header('Content-Type: application/json');

if (!isset($_GET['item'])) {
    echo json_encode(['error' => 'Missing item parameter']);
    exit;
}

$item = urlencode($_GET['item']);
$appId = 'SECRET_APP_ID';

$url = "https://svcs.ebay.com/services/search/FindingService/v1?" .
       "OPERATION-NAME=findItemsByKeywords&" .
       "SERVICE-VERSION=1.0.0&" .
       "SECURITY-APPNAME=$appId&" .
       "RESPONSE-DATA-FORMAT=JSON&" .
       "keywords=$item&" .
       "paginationInput.entriesPerPage=5";

$response = file_get_contents($url);
$data = json_decode($response, true);

if (!$data || !isset($data['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'])) {
    echo json_encode(['error' => 'No items found']);
    exit;
}

$items = $data['findItemsByKeywordsResponse'][0]['searchResult'][0]['item'];
$results = [];

for ($i = 0; $i < count($items); $i++) {
    if (isset($items[$i]['sellingStatus'][0]['currentPrice'][0])) {
        $price = $items[$i]['sellingStatus'][0]['currentPrice'][0];
        $results[] = [
            'title' => $items[$i]['title'][0] ?? 'N/A',
            'price' => $price['__value__'],
            'currency' => $price['@currencyId'],
            'url' => $items[$i]['viewItemURL'][0] ?? ''
        ];
    }
}

echo json_encode(['items' => $results, 'count' => count($results)]);
?>
