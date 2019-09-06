<?php
/**
 * Created by PhpStorm.
 * User: Hawlet Packard
 * Date: 24/01/2019
 * Time: 10:55 PM
 */
//this object is unversal. And can be transferred back and forth with other languages that support json.
$jsonEncoded = '{"eventName":"Test","eventType":null,"country":null,"startDate":"","endDate":""}';

//right now its a json encoded object. we cant directly use properties like:
//now we convert it to PPH format
$jsonDecoded = json_decode($jsonEncoded);
echo $jsonDecoded->eventName;

//wait i see on my pc.
//see - we made javascript object into php array.
//now we made javascript object into php object.
//kuch samaj aya?
//json k through we move objects between languages. ok? decode means json jo string ha use object me convert kerde.
//ham ne basically javascritp se JSON ki string banae. us string ko php me dia. or php se json wapis.
//isi tarah ham ajax me kerte ha
//ham php array banate ha use json_ecndoe kerte ha takay aik STRING ajae. Us string ko javascript ko dete ha then javascript us string ko wapis JSON me convert.

 //me kam kerrha ho continue. yaha tak smj aya? yeh json decode direct request leleta hai ?
//json_decode me ham ne variable dia ha uper see.