<?php
/*
2. Сделайте рефакторинг
...
$questionsQ = $mysqli->query('SELECT * FROM questions WHERE catalog_id='. $catId);
$result = array();
while ($question = $questionsQ->fetch_assoc()) {
    $userQ = $mysqli->query('SELECT name, gender FROM users WHERE id='. $question['user_id']);
    $user = $userQ->fetch_assoc();
    $result[] = array('question'=>$question, 'user'=>$user);
    $userQ->free();
}
$questionsQ->free();
…
*/

//Ответ:
//...
$catIdQuoted = $mysqli->real_escape_string($catId);
$userQuestionsQ = $mysqli->query("SELECT 
                                      u.name AS name, 
                                      u.gender AS gender, 
                                      q.catalog_id AS catalog_id, 
                                      q.user_id AS user_id
                                  FROM users AS u
                                  LEFT JOIN questions AS q ON u.id = q.user_id 
                                  WHERE q.catalog_id='{$catIdQuoted}'");

$result = [];
while ($userQuestion = $userQuestionsQ->fetch_assoc()) {
    $result[] = [
        'question' => [
            'catalog_id' => $userQuestion['catalog_id'],
            'user_id' => $userQuestion['user_id'],
        ],
        'user' => [
            'name' => $userQuestion['name'],
            'gender' => $userQuestion['gender'],
        ]];
}
$userQuestionsQ->free();
//...


