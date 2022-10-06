//var tables = document.getElementsByClassName('flexiCol');
var tables = document.getElementsByTagName('table');
for (var i=0; i<tables.length;i++){
 resizableGrid(tables[i]);
}

function resizableGrid(table) {
 var row = table.getElementsByTagName('tr')[0],
 cols = row ? row.children : undefined;
 if (!cols) return;
 
 table.style.overflow = 'hidden';
 
 var tableHeight = table.offsetHeight;
 
 for (var i=0;i<cols.length;i++){ 
  var div = createDiv(tableHeight);
  cols[i].appendChild(div);
  cols[i].style.position = 'relative'; 
  cols[i].style.width=sessionStorage.getItem('finalW'+i);
  console.log(sessionStorage.getItem(cols[i]));

  setListeners(div);


 }


 function setListeners(div){
  var pageX,curCol,nxtCol,curColWidth,nxtColWidth;
  

  div.addEventListener('mousedown', function (e) { 
   curCol = e.target.parentElement; //console.log(curCol.id);
   nxtCol = curCol.nextElementSibling;
   pageX = e.pageX; 
 
   var padding = paddingDiff(curCol);
 
   curColWidth = curCol.offsetWidth - padding;
    //
    var row = table.getElementsByTagName('tr')[0],
    cols = row ? row.children : undefined;
     //

   if (nxtCol)
    nxtColWidth = nxtCol.offsetWidth - padding;
    
    
  });

  div.addEventListener('mouseover', function (e) {
   e.target.style.borderRight = '2px solid #0000ff'; 
  })

  div.addEventListener('mouseout', function (e) {
   e.target.style.borderRight = '';
    //console.log(finalWidth);


  })



  document.addEventListener('mousemove', function (e) {
   if (curCol) {
    var diffX = e.pageX - pageX;
 
    if (nxtCol)
     nxtCol.style.width = (nxtColWidth - (diffX))+'px';
     nxt = nxtCol.style.width; nxt_id=1;
    curCol.style.width = (curColWidth + diffX)+'px';
    finalWidth = curCol.style.width;
   sessionStorage.setItem('finalW'+curCol.id, finalWidth===undefined?'5px':finalWidth);
   sessionStorage.setItem('finalW'+( +curCol.id + +nxt_id), nxt===undefined?'5px':nxt);
   }
   
   //console.log(finalWidth,curCol);
  });

  document.addEventListener('mouseup', function (e) { 
   curCol = undefined;
   nxtCol = undefined;
   pageX = undefined;
   nxtColWidth = undefined;
   curColWidth = undefined;
   //console.log(curColWidth);

  

  }); 
 }
 var finalWidth;
 

 function createDiv(height){
  var div = document.createElement('div');
  div.style.top = 0;
  div.style.right = 0;
  if(finalWidth!=undefined)
  div.style.width = finalWidth;
else
  div.style.width = '5px';
  div.style.position = 'absolute';
  div.style.cursor = 'col-resize';
  div.style.userSelect = 'none';
  div.style.height = height + 'px';
  return div;
 }
 
 function paddingDiff(col){
 
  if (getStyleVal(col,'box-sizing') == 'border-box'){
   return 0;
  }
 
  var padLeft = getStyleVal(col,'padding-left');
  var padRight = getStyleVal(col,'padding-right');
  return (parseInt(padLeft) + parseInt(padRight));

 }

 function getStyleVal(elm,css){
  return (window.getComputedStyle(elm, null).getPropertyValue(css))
 }
};