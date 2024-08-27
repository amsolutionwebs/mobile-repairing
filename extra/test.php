<?php
 // Download printer driver for dot matrix printer ex. 1979 Dot Matrix      Regular or Consola

?>
<html>
<head>
<title>PHP to Dot Matrix Printer</title>

<style>
@font-face { font-family: kitfont; src: url('1979 Dot Matrix Regular.TTF'); } 

.customFont { /*  <div class="customFont" /> */
font-style: kitfont;
font-size:10;
}
#mainDiv {
height: 324px; /* height of receipt 4.5 inches*/
width: 618px;  /* weight of receipt 8.6 inches*/
position:relative; /* positioned relative to its normal position */
}
#cqm { /*  <img id="cqm" /> */
top: 10px; /* top is distance from top (x axis)*/
left: 105px; /* left is distance from left (y axis)*/
position:absolute; /* position absolute based on "top" and "left"    parameters x and y  */
}

#or_mto { 
position: absolute;
left: 0px;
top: 0px;
z-index: -1; /*image */
}

    #arpno {
top: 80px;
left: 10px;
position:absolute;
}
#payee {
top: 80px;
left: 200px;
position:absolute;
}
#credit {
top: 80px;
right: 30px; /*   distance from right */
position:absolute;
}
#paydate {
top: 57px;
right: 120px;
position:absolute;
}
 </style>

</head>
<body>
<?php
//sample data

$arpno   = 1234567;
$payee   = "Juan dela Cruz";
$credit  = 10000;
$paydate = "Dec. 6, 2015" ;


?>

<button onclick="ExportToDoc('exportContent');">Export as .doc</button>
<div id="exportContent">
<h1>
        <center>CodersFever</center>
    </h1>
    <h2>Easy Learing Plateform</h2>
    <p>
       CodesFever emerged from the concept that there is a category of readers who respond best to online web content and prefer to learn new skills from the comforts of their drawing rooms at their own place.</p>
<p>
Individual, corporate and academic members have access to learn anything on codesfever.com likes video tutorials, blogs content etc. From many years, we worked our way to adding new fresh articles on topics ranging from programming languages that helps students, leaders, IT and design professionals, project managers or anyone who is working with software development, creatives and business skills.
    </p>
<div>


<script>
function ExportToDoc(element, filename = ''){
    var header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML to Word Document with JavaScript</title></head><body>";

    var footer = "</body></html>";

    var html = header+document.getElementById(element).innerHTML+footer;

    var blob = new Blob(['\ufeff', html], {
        type: 'application/msword'
    });
    
    // Specify link url
    var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
    
    // Specify file name
    filename = filename?filename+'.docx':'document.docx';
    
    // Create download link element
    var downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob ){
        navigator.msSaveOrOpenBlob(blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = url;
        
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
    
    document.body.removeChild(downloadLink);
}
</script>

</body>
</html>