<?php $this->Html->scriptStart(['block' => true]); ?>
function getByAjax(url, success){
	var xmlhttp;
	if (window.XMLHttpRequest)
	  {
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }

	xmlhttp.open("GET",url,true);
	xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState===4 &&  xmlhttp.status==200){
			success(xmlhttp.responseText);
		}
	}
	xmlhttp.send();
}
getByAjax("/revisions/revisions/element_index/<?=$id?>/<?=(empty($limit)?0:$limit)?>/<?=(empty($model)?0:$model)?>", function(data){
	var element = document.getElementById('RevisionsIndexListSpan');
	element.innerHTML = data;
});
function hideElement(id){
	document.getElementById(id).style.display = 'none';
}
function showElement(id){
	document.getElementById(id).style.display = '';
}
function compareRevisions(a_id, b_id){
	getByAjax("/revisions/revisions/element_compare/"+a_id+"/"+b_id, function(data){
		var element = document.getElementById('RevisionsIndexCompareDataSpan');
		element.innerHTML = data;
		hideElement('RevisionsIndexListSpan');
		showElement('RevisionsIndexCompareSpan');
	});
}
function closeComparison(){
	showElement('RevisionsIndexListSpan');
	hideElement('RevisionsIndexCompareSpan');
}
function restoreToBefore(id){
	getByAjax("/revisions/revisions/element_restore/"+id+"/before", function(data){
		window.location.reload(true);
	});
}
function restoreToAfter(id){
	getByAjax("/revisions/revisions/element_restore/"+id+"/after", function(data){
		window.location.reload(true);
	});
}

<?php $this->Html->scriptEnd(); ?>
<span id="RevisionsIndexListSpan"></span>
<span id="RevisionsIndexCompareSpan" style='display: none;'>
	<br/>
	<a href="#" onclick="event.preventDefault();closeComparison();">Close comparison</a>
	<br/><br/>
	<span id="RevisionsIndexCompareDataSpan"></span>
</span>