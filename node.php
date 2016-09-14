<?php

//调用getNodesInfo函数  
//getNodesInfo($root); 

function getNodesInfo($node)  
{  
   if ($node->hasChildNodes())  
   {  
      $subNodes = $node->childNodes;  
     foreach ($subNodes as $subNode)  
      {  
	     $nodes[]=$subNode;
         if (($subNode->nodeType != 3) ||   
            (($subNode->nodeType == 3)    
            &&(strlen(trim($subNode->wholeText))>=1)))     
         {  
         echo "Node name: ".$subNode->nodeName."<br>";  
         echo "Node value: ".$subNode->nodeValue."<br>";  
         }  
      getNodesInfo($subNode);     
	 
      } 
	    
   }        
}     




$file_name=$_POST["file_name"];
$word_name=$_POST["word_name"];
$word_type=$_POST["word_type"];
$update_type=$_POST["update_type"];
$system_type=$_POST["system_type"];


$system_len=count($system_type);
$update_len=count($update_type);

function windows($select) 
{
  global $word_type,$word_name,$file_name,$system_type,$update_type;
  switch($select)
   {
	 case '-video':
	  
	  $onclick="vid('".$word_type."/".$file_name.".mp4.f4m')";
	  $file_path='../'.$system_type[0].'/content/word/'.$word_type.'/'.$word_type.'-video.html';
	  
	  $doc = new DOMDocument();

	  $doc->loadHTMLFile($file_path);
	  $doc->encoding='utf-8';
	  $doc->formatOutput = true;
	  $root =$doc->getElementsByTagName("a")->item(0);
	  
	  $p=$doc->createElement("p","");
	  $p->setAttribute("id", "stream");
	  $doc->appendChild($p);
	  $root->parentNode->insertBefore($p,$root);
	  
	  $pr=$doc->getElementById('stream');	  	  	  
	  
	  $word = $doc->createElement("a",$word_name);
	  $word->setAttribute("class","tryitbtn");
	  $word->setAttribute("href", '#');
	  $word->setAttribute("onclick", $onclick);
	  
	  $doc->appendChild($word);
	  $root->parentNode->insertBefore($word,$pr);
	  
	  $h= $doc->saveHTML(); 
	  
	  file_put_contents($file_path,$h);
	  
	  $content = file_get_contents($file_path);
	  $content = str_replace('<p id="stream"></p>','',$content);
	  file_put_contents($file_path,$content);
	  echo $content;	    
	  break;
	  
	 case '-audio':
	  
	  $onclick="aud('".$word_type."/".$file_name.".mp3')";
	  $file_path='../'.$system_type[0].'/content/word/'.$word_type.'/'.$word_type.'-audio.html';
	  
	  $doc = new DOMDocument();

	  $doc->loadHTMLFile($file_path);
	  $doc->encoding='utf-8';
	  $doc->formatOutput = true;
	  $root =$doc->getElementsByTagName("a")->item(0);
	  
	  $p=$doc->createElement("p","");
	  $p->setAttribute("id", "stream");
	  $doc->appendChild($p);
	  $root->parentNode->insertBefore($p,$root);
	  
	  $pr=$doc->getElementById('stream');	  	  	  
	  
	  $word = $doc->createElement("a",$word_name);
	  $word->setAttribute("class","tryitbtn");
	  $word->setAttribute("href", '#');
	  $word->setAttribute("onclick", $onclick);
	  
	  $doc->appendChild($word);
	  $root->parentNode->insertBefore($word,$pr);
	  
	  $h= $doc->saveHTML(); 
	  
	  file_put_contents($file_path,$h);
	  
	  $content = file_get_contents($file_path);
	  $content = str_replace('<p id="stream"></p>','',$content);
	  file_put_contents($file_path,$content);
	  //echo $content;	    
	  break;   
	
	 case '-add':
	  
	  $onclick="vid('".$word_type."/".$file_name."add.mp4.f4m')";
	  $file_path='../'.$system_type[0].'/content/word/'.$word_type.'/'.$word_type.'-add.html';
	  
	  $doc = new DOMDocument();

	  $doc->loadHTMLFile($file_path);
	  $doc->encoding='utf-8';
	  $doc->formatOutput = true;
	  $root =$doc->getElementsByTagName("a")->item(0);
	  
	  $p=$doc->createElement("p","");
	  $p->setAttribute("id", "stream");
	  $doc->appendChild($p);
	  $root->parentNode->insertBefore($p,$root);
	  
	  $pr=$doc->getElementById('stream');	  	  	  
	  
	  $word = $doc->createElement("a",$word_name);
	  $word->setAttribute("class","tryitbtn");
	  $word->setAttribute("href", '#');
	  $word->setAttribute("onclick", $onclick);
	  
	  $doc->appendChild($word);
	  $root->parentNode->insertBefore($word,$pr);
	  
	  $h= $doc->saveHTML(); 
	  
	  file_put_contents($file_path,$h);
	  
	  $content = file_get_contents($file_path);
	  $content = str_replace('<p id="stream"></p>','',$content);
	  file_put_contents($file_path,$content);
	  //echo $content;	    
	  break;	
	  
	}
}

function android($select) 
{
  global $word_type,$word_name,$file_name,$system_type,$update_type;
  switch($select)
   {
	 case '-video':
	  $url="rtmp://220.135.29.208:2158/vod/mp4:";
	  $href=$url.$word_type."/".$file_name.".mp4";
	  $file_path='../'.$system_type[1].'/content/word/'.$word_type.'/'.$word_type.'-video.html';
	  
	  $doc = new DOMDocument();

	  $doc->loadHTMLFile($file_path);
	  $doc->encoding='utf-8';
	  $doc->formatOutput = true;
	  $root =$doc->getElementsByTagName("a")->item(0);
	  
	  $p=$doc->createElement("p","");
	  $p->setAttribute("id", "stream");
	  $doc->appendChild($p);
	  $root->parentNode->insertBefore($p,$root);
	  
	  $pr=$doc->getElementById('stream');	  	  	  
	  
	  $word = $doc->createElement("a",$word_name);
	  $word->setAttribute("class","tryitbtn");
	  $word->setAttribute("href", $href);
	  
	  $doc->appendChild($word);
	  $root->parentNode->insertBefore($word,$pr);
	  
	  $h= $doc->saveHTML(); 
	  
	  file_put_contents($file_path,$h);
	  
	  $content = file_get_contents($file_path);
	  $content = str_replace('<p id="stream"></p>','',$content);
	  file_put_contents($file_path,$content);
	  //echo $content;	    
	  break;
	  
	 case '-audio':
	 
	  $url="rtmp://220.135.29.208:2158/vod/Word/";
	  $href=$url.$word_type."/".$file_name.".mp3";
	  $file_path='../'.$system_type[1].'/content/word/'.$word_type.'/'.$word_type.'-audio.html';
	  
	  $doc = new DOMDocument();

	  $doc->loadHTMLFile($file_path);
	  $doc->encoding='utf-8';
	  $doc->formatOutput = true;
	  $root =$doc->getElementsByTagName("a")->item(0);
	  
	  $p=$doc->createElement("p","");
	  $p->setAttribute("id", "stream");
	  $doc->appendChild($p);
	  $root->parentNode->insertBefore($p,$root);
	  
	  $pr=$doc->getElementById('stream');	  	  	  
	  
	  $word = $doc->createElement("a",$word_name);
	  $word->setAttribute("class","tryitbtn");
	  $word->setAttribute("href", $href);

	  
	  $doc->appendChild($word);
	  $root->parentNode->insertBefore($word,$pr);
	  
	  $h= $doc->saveHTML(); 
	  
	  file_put_contents($file_path,$h);
	  
	  $content = file_get_contents($file_path);
	  $content = str_replace('<p id="stream"></p>','',$content);
	  file_put_contents($file_path,$content);
	  //echo $content;	    
	  break;   
	
	 case '-add':
	  
	  $url="rtmp://220.135.29.208:2735/vod/mp4:";
	  $href=$url.$word_type."/".$file_name."add.mp4";
	  $file_path='../'.$system_type[1].'/content/word/'.$word_type.'/'.$word_type.'-add.html';
	  
	  $doc = new DOMDocument();

	  $doc->loadHTMLFile($file_path);
	  $doc->encoding='utf-8';
	  $doc->formatOutput = true;
	  $root =$doc->getElementsByTagName("a")->item(0);
	  
	  $p=$doc->createElement("p","");
	  $p->setAttribute("id", "stream");
	  $doc->appendChild($p);
	  $root->parentNode->insertBefore($p,$root);
	  
	  $pr=$doc->getElementById('stream');	  	  	  
	  
	  $word = $doc->createElement("a",$word_name);
	  $word->setAttribute("class","tryitbtn");
	  $word->setAttribute("href", $href);
	  
	  $doc->appendChild($word);
	  $root->parentNode->insertBefore($word,$pr);
	  
	  $h= $doc->saveHTML(); 
	  
	  file_put_contents($file_path,$h);
	  
	  $content = file_get_contents($file_path);
	  $content = str_replace('<p id="stream"></p>','',$content);
	  file_put_contents($file_path,$content);
	  //echo $content;	    
	  break;	
	  
	}
}


function ios($select) 
{
  global $word_type,$word_name,$file_name,$system_type,$update_type;
  switch($select)
   {
	 case '-video':
	  $url="http://220.135.29.208:8134/hls-vod/";
	  $href=$url.$word_type."/".$file_name.".mp4.m3u8";
	  $file_path='../'.$system_type[2].'/content/word/'.$word_type.'/'.$word_type.'-video.html';
	  
	  $doc = new DOMDocument();

	  $doc->loadHTMLFile($file_path);
	  $doc->encoding='utf-8';
	  $doc->formatOutput = true;
	  $root =$doc->getElementsByTagName("a")->item(0);
	  
	  $p=$doc->createElement("p","");
	  $p->setAttribute("id", "stream");
	  $doc->appendChild($p);
	  $root->parentNode->insertBefore($p,$root);
	  
	  $pr=$doc->getElementById('stream');	  	  	  
	  
	  $word = $doc->createElement("a",$word_name);
	  $word->setAttribute("class","tryitbtn");
	  $word->setAttribute("href", $href);
	  
	  $doc->appendChild($word);
	  $root->parentNode->insertBefore($word,$pr);
	  
	  $h= $doc->saveHTML(); 
	  
	  file_put_contents($file_path,$h);
	  
	  $content = file_get_contents($file_path);
	  $content = str_replace('<p id="stream"></p>','',$content);
	  file_put_contents($file_path,$content);
	  //echo $content;	    
	  break;
	  
	 case '-audio':
	 
	  $onclick="aud('".$word_type."/".$file_name.".mp3')";
	  $file_path='../'.$system_type[2].'/content/word/'.$word_type.'/'.$word_type.'-audio.html';
	  
	  $doc = new DOMDocument();

	  $doc->loadHTMLFile($file_path);
	  $doc->encoding='utf-8';
	  $doc->formatOutput = true;
	  $root =$doc->getElementsByTagName("a")->item(0);
	  
	  $p=$doc->createElement("p","");
	  $p->setAttribute("id", "stream");
	  $doc->appendChild($p);
	  $root->parentNode->insertBefore($p,$root);
	  
	  $pr=$doc->getElementById('stream');	  	  	  
	  
	  $word = $doc->createElement("a",$word_name);
	  $word->setAttribute("class","tryitbtn");
	  $word->setAttribute("href", '#');
 	  $word->setAttribute("onclick",$onclick);

	  
	  $doc->appendChild($word);
	  $root->parentNode->insertBefore($word,$pr);
	  
	  $h= $doc->saveHTML(); 
	  
	  file_put_contents($file_path,$h);
	  
	  $content = file_get_contents($file_path);
	  $content = str_replace('<p id="stream"></p>','',$content);
	  file_put_contents($file_path,$content);
	  //echo $content;	    
	  break;   
	
	 case '-add':
	  
	  $url="http://220.135.29.208:8134/hls-vod/";
	  $href=$url.$word_type."/".$file_name."add.mp4.m3u8";
	  $file_path='../'.$system_type[2].'/content/word/'.$word_type.'/'.$word_type.'-add.html';
	  
	  $doc = new DOMDocument();

	  $doc->loadHTMLFile($file_path);
	  $doc->encoding='utf-8';
	  $doc->formatOutput = true;
	  $root =$doc->getElementsByTagName("a")->item(0);
	  
	  $p=$doc->createElement("p","");
	  $p->setAttribute("id", "stream");
	  $doc->appendChild($p);
	  $root->parentNode->insertBefore($p,$root);
	  
	  $pr=$doc->getElementById('stream');	  	  	  
	  
	  $word = $doc->createElement("a",$word_name);
	  $word->setAttribute("class","tryitbtn");
	  $word->setAttribute("href", $href);
	  
	  $doc->appendChild($word);
	  $root->parentNode->insertBefore($word,$pr);
	  
	  $h= $doc->saveHTML(); 
	  
	  file_put_contents($file_path,$h);
	  
	  $content = file_get_contents($file_path);
	  $content = str_replace('<p id="stream"></p>','',$content);
	  file_put_contents($file_path,$content);
//	  echo $content;	    
	  break;	
	  
	}
}



if($system_len=3)
 {
   for($i=0;$i<$update_len;$i++)
    {
	  windows($update_type[$i]);
	  android($update_type[$i]);
	  ios($update_type[$i]);	
	}
	echo '修改完成!';
	echo "<br><a href='http://gracelight.ml/modules/test/'>返回上一頁</a>";
 }

?>

