<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



class FOAFRDF{
    
    public static function __init(){
        header('content-type: application/rdf+xml');
        echo '<rdf:RDF
      xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
      xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
      xmlns:foaf="http://xmlns.com/foaf/0.1/"
      xmlns:admin="http://webns.net/mvcb/">
        <foaf:PersonalProfileDocument rdf:about="">
          <foaf:maker rdf:resource="#me"/>
          <foaf:primaryTopic rdf:resource="#me"/>
          <admin:generatorAgent rdf:resource="http://www.ldodds.com/foaf/foaf-a-matic"/>
          <admin:errorReportsTo rdf:resource="mailto:leigh@ldodds.com"/>
        </foaf:PersonalProfileDocument>
        <foaf:Person rdf:ID="me">
        <foaf:name>Mostafa A. Hamid</foaf:name>
        <foaf:title>Mr</foaf:title>
        <foaf:givenname>Mostafa</foaf:givenname>
        <foaf:family_name>A. Hamid</foaf:family_name>
        <foaf:nick>Atwa</foaf:nick>
        <foaf:mbox_sha1sum>1698d9ab91085ba2e15717f5f4dc5c0558ec60d9</foaf:mbox_sha1sum>
        <foaf:homepage rdf:resource="http://www.google.com/"/>
        <foaf:depiction rdf:resource="introducingmyresume.netau.net/images/qrCode.png"/>
        <foaf:phone rdf:resource="tel:00201099531733"/>
        <foaf:workplaceHomepage rdf:resource="introducingmyresume.netau.net/"/>
        <foaf:workInfoHomepage rdf:resource="http://afaqy.com"/>
        <foaf:schoolHomepage rdf:resource="http://google.com/"/>
        <foaf:knows>
        <foaf:Person>
        <foaf:name>Manon</foaf:name>
        <foaf:mbox_sha1sum>de17c8e35e4dc2ded2849bf4b992306d1feaa6e6</foaf:mbox_sha1sum>
        <rdfs:seeAlso rdf:resource="facebook/manonmccallister"/></foaf:Person></foaf:knows></foaf:Person>
        </rdf:RDF>';
        
    }
    
}
