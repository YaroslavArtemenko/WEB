var logind = false;
var login, password;
var users=[
[1,'pavlo','1111','Not Banned', 'pavlo', 'olshansky'],
[2,'dasha@mail.ru','2222','Banned', 'dasha', 'furcomen'],
[3,'nazar@asdfg.ua','3333','Not Banned', 'nazar', 'makloren'],
[4,'anton@qwerty.ua','4444','Not Banned', 'anton', 'vilikanov'],
[5,'chuck@zxcv.ua','5555','Not Banned', 'chuck', 'ivanov'],
];



var comments=[
['index.html','1','Клод Моне - улюблений художник','29.08.2015', '1'],
['index.html','2','Чудова галерея картин!','1.09.2015', '2'],
['index.html','3','Дуже зручний сайт!Рекомендую!','1.09.2015', '3'],
['index.html','4','Сайт дуже сподобався!','2.09.2015', '4'],
['index.html','5','Добре підібрана інформація!','4.09.2015', '5'],
['index.html','1','Багато картин!Мені подобається!','6.09.2015', '1'],
];


var new_comments=[
['index.html','2','Потрібно більше картин!','29.08.2014', '2'],
['index.html','4','Мало інформацію про Моне','29.08.2014', '4'],
['index.html','5','Хороший сайт!!!','29.08.2014', '5'],
];


function del(m){
	for(var i=0;i<comments.length;i++)
		if(comments[i][4]==m)
			comments.splice(i,1);
};

function del_new(m){
	for(var i=0;i<new_comments.length;i++)
		if(new_comments[i][4]==m)
			new_comments.splice(i,1);
};


function ban(m){
	var t='Not Banned';
	var f='Banned';
		for(var i=0;i<users.length;i++)
		if(users[i][0]==m)
		{
			if (users[i][3]==t)
				users[i][3]=f;
			else
				users[i][3]=t;
		}
	print_comment_adm2();
};


function new_comment(com){
	if(!logind)
		alert('Ви повинні авторизуватись!')
	else{
		var date = new Date();
		d = date.getDate();
		y = date.getFullYear();
		m = date.getMonth() + 1;
		var newz = [];
		newz.push('index.php');
		for(var i=0; i<users.length;i++)
			if(users[i][1] == login)
				newz.push(users[i][0])
		newz.push(com);
		newz.push(d+'.'+m+'.'+y);
		newz.push(parseInt(comments[comments.length-1][4]) + 1)
		comments.push(newz);
	}
};


function print_comment(){
	var result='<table align="left" width="100%">';
	for (var i=0; i<comments.length; i++)
		result=result+'<tr><td width="15%">'+users[comments[i][1]-1][1]+'</td><td>'+comments[i][2]+'</td><td width="10%">'+comments[i][3]+'</td></tr>';
	result=result+'</table>';
	document.getElementById('comments').innerHTML=result;
};


function print_new_comment_adm(){
	var result='<table align="left" width="100%">';
	for (var i=0; i<new_comments.length; i++)
		result=result+'<tr><td width="15%">'+users[new_comments[i][1]-1][1]+'</td><td>'+new_comments[i][2]+'</td><td width="10%">'+new_comments[i][3]+'</td><td width="15%"><button onclick="del_new('+new_comments[i][4]+'); print_new_comment_adm(); return false">Видалити</button><button onclick="new_push('+i+'); del_new('+new_comments[i][4]+'); print_comment_adm(); print_new_comment_adm(); return false">Додати</button></td></tr>';
	result=result+'</table>';
	document.getElementById('sas-new-comments').innerHTML=result;
}


function print_comment_adm(){
	var result='<table align="left" width="100%">';
	for (var i=0; i<comments.length; i++)
		result=result+'<tr><td width="15%">'+users[comments[i][1]-1][1]+'</td><td>'+comments[i][2]+'</td><td width="10%">'+comments[i][3]+'</td><td width="10%"><button onclick="del('+comments[i][4]+'); print_comment_adm(); return false">Видалити коментар</button></td></tr>';
	result=result+'</table>';
	document.getElementById('comments').innerHTML=result;
};


function print_comment_adm2(){
	var s='<table id="tablet"  border=1><tbody><tr><th>User ID</th><th>E-mail</th><th>Password</th><th>Status</th><th>Name</th><th>Surname</th><th width="162">Ban Button</th></tr>';
	for ( var i=0;i<users.length;i++)
		s=s+'<tr><td>'
		+ users[i][0]
		+'</td><td>'
		+ users[i][1]
		+'</td><td>'
		+ users[i][2]
		+'</td><td>'
		+ users[i][3]
		+'</td><td>'
		+ users[i][4]
		+'</td><td>'
		+ users[i][5]
		+'</td><td><button onclick="ban('+users[i][0]
		+')">Додати/видалити з чорного списку</button></td></tr>';
		s=s+'</tbody></table>';
		document.getElementById('sas-comments').innerHTML=s;
}


function new_push(i){
	comments.push(new_comments[i])
}


function not_banned(n){
	for(var i=0;i<users.length;i++)
	if((users[i][3]=='Not Banned')&&(users[i][1]==n))
		return true;
	else if((users[i][3]=='Banned')&&(users[i][1]==n))
		return false;
	alert('Users wasn\'t found');
};


function loggining(){
	login = document.getElementById('form1').logn.value;
	password = document.getElementById('form1').pass.value;
	var pict='<div><h6>&nbsp;</h6><img alt="Admin" src="beardienya.jpg"></div>'
	for(var i=0; i<users.length; i++){
		if(login=='admin' && password=='admin'){
			alert('Вы авторизувались як адміністратор');
			logind = true;
			document.getElementById('SAS1').style.display = 'inline';
			document.getElementById('SAS2').style.display = 'inline';
			document.getElementById('form1').logn.value = '';
			document.getElementById('form1').pass.value = '';
			return;
		}
		if((login == users[i][1]) && (password == users[i][2]) && !not_banned(login)){
			alert('Ваш акаунт заблокований');
			document.getElementById('form1').logn.value = '';
			document.getElementById('form1').pass.value = '';
			return;
		}
		if((login == users[i][1]) && (password == users[i][2]) && not_banned(login)){
			logind = true;
			alert('Ви успішно авторизувались. Ласкаво просимо');
			document.getElementById('form1').logn.value = '';
			document.getElementById('form1').pass.value = '';
			return;
		}
	}
	if(!logind)
		document.getElementById('form1').logn.value = '';
		document.getElementById('form1').pass.value = '';
		alert('Такого користувача немає в базі');
}
