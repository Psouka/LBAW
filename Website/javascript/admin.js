var count = 0;
var uLimit = 11;
var uStart = 0;

function completeHtmlUsers(data){
console.log(data);

$("#listUsers").empty();

$.each(data, function(i, value) {
	$("#listUsers").append(
		'<div class="panel-group" id="accordionUser' +count+'">\
		<div class="panel panel-default">\
		<div class="panel-heading">\
		<h4 class="panel-title">\
		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionUser' +count+'" href="#collapseUser'+count+'">' + value.utilizador + ':  ' + value.nomeproprio + ' ' + value.sobrenome + ' <span class="caret">\
		</span></a> <span class="badge pull-right">' +value.nrleiloes + ' auctions</span>\
		</h4>\
		</div>\
		<div class="panel-collapse collapse" id="collapseUser' +count+'">\
		<div class="list-group">\
		<a href="profile.php' + '?id=' + value.idutilizador +'"class="list-group-item active">Profile</a>\
		<a href="item.php" class="list-group-item"><span class="badge">2 bids</span> Fourth Auction</a>\
		</div>\
		</div>\
		</div>\
		</div>'
		);

	count++;
});
}

function completeHtmlAuctions(data){
console.log(data);

$("#listAuctions").empty();

$.each(data, function(i, value) {
	var preco = 0;
	if(value.licitacao !== null)
	preco = value.licitacao;
	else {
		preco = value.precoinicial;
	}


	$("#listAuctions").append(
	'<div class="panel-group" id="accordionAuction'+i+'">\
	<div class="panel panel-default">\
	<div class="panel-heading">\
	<h4 class="panel-title">\
	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionAuction'+i+'" href="#collapseAuction'+i+'">'+ value.nome +' <span class="caret">\
	</span></a><span class="badge pull-right">Price: ' + preco +' €</span><span class="badge pull-right">4 bids</span><!--span class="badge pull-right" style=" background-color: red;">Reported</span-->\
	</h4>\
	</div>\
	<div class="panel-collapse collapse" id="collapseAuction'+i+'">\
	<div class="list-group">\
	<a href="item.php?id='+ value.idleilao +' " class="list-group-item active">Auction Page</a>\
	<a href="item.php" class="list-group-item"><span class="badge">€ Bid</span> User1</a>\
	</div>\
	</div>\
	</div>\
	</div>'

		);
});
}



function firstListU(){
$.post("../actions/admin/admin.php", {
	userLimit: uLimit,
	userStart: uStart
}, function(data) {
	completeHtmlUsers(data);
}, "json");
}

function firstListA(){
$.post("../actions/admin/admin.php", {
	leiloesLimit: uLimit,
	leiloesStart: uStart
}, function(data) {
	completeHtmlAuctions(data);
}, "json");
}


function wordSearchUser(){
var word = $('#wordUser').val();
if(word == "")
	firstListU();


$.post("../actions/admin/admin.php", {
	userLimit: uLimit,
	userStart: uStart,
	userWord: word
}, function(data) {
	completeHtmlUsers(data);
}, "json");
}

function wordSearchAuction(){
var word = $('#wordAuction').val();
if(word == "")
	firstListA();

$.post("../actions/admin/admin.php", {
	leiloesLimit: uLimit,
	leiloesStart: uStart,
	leiloesWord: word
}, function(data) {
	completeHtmlAuctions(data);
}, "json");
}

$(document).ready(function(){

firstListA();
firstListU();


$('#wordUser').keypress(function(e) {
    if(e.which == 13) {
    	wordSearchUser();

    }
});
$('#wordAuction').keypress(function(e) {
    if(e.which == 13) {
    	wordSearchAuction();
    }
});

});
