var data =    $('#myForm').serializeArray();    
data.push({
    name: 'elementName', 
    value: 'elementValue',
    Type: 'element type'
}); 
$.post("invquery.php", data);