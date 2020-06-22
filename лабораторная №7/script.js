/*questionmain*/
/*function valid(form){
	var fail = false;
	var email = form.email.value;
	var password = form.password.value;
	var adr_pattern = /[0-9a-z_]+@[0-9a-z_]+\.[a-z]{2,5}/i;
	if (email == "admin" && password == "admin")
		window.location = "admin.html";
	if (adr_pattern.test(email) == false) {
		fail = "Введите email";
	}
	else if (password == "") {
		fail = "Вы не ввели пароль!";
	}	
	if (fail) {
		alert(fail);
	}
	else
		window.location = "Question.html"
}	
*/
/*for reg*/
/*   function showError(container, errorMessage) {
      container.className = 'error';
      var msgElem = document.createElement('span');
      msgElem.className = "error-message";
      msgElem.innerHTML = errorMessage;
      container.appendChild(msgElem);
    }

    function resetError(container) {
      container.className = '';
      if (container.lastChild.className == "error-message") {
        container.removeChild(container.lastChild);
      }
    }

    function validate(form) {
      var elems = form.elements;
      var adr_pattern = /[0-9a-z_]+@[0-9a-z_]+\.[a-z]{2,5}/i;
	  var email = form.email.value;

      resetError(elems.name.parentNode);
      if (!elems.name.value) {
        showError(elems.name.parentNode, ' Укажите имя');
      }
      resetError(elems.surname.parentNode);
      if (!elems.surname.value) {
        showError(elems.surname.parentNode, ' Укажите фамилию');
      }
      resetError(elems.email.parentNode);
      if (adr_pattern.test(email) == false) {
		showError(elems.email.parentNode, ' Укажите Email');
	}

      resetError(elems.password.parentNode);
      if (!elems.password.value) {
        showError(elems.password.parentNode, ' Укажите пароль.');
      } else if (elems.password.value != elems.password2.value) {
        showError(elems.password.parentNode, ' Пароли не совпадают.');
      }

    }
    /*-------------------------------------------------------------*/

	var a=document.getElementsByTagName("input"); 
	var currUser = ""; // поточний користувач
	var commentArr = []; // массив коментарів,які підтверджені адміністратором
	var commentTempArr = []; // массив коментарів,які потребують підтвердження адміністратора
	var userArr = []; // массив користувачів,що зареєструвались
	var deletedUsers = []; // массив користувачів,які є заблоковані адміністратором
		
	userArr[0] = { 
		login: "admin",
		password: "admin",
		email: "yarok1999@gmail.com",
		date: "1999-08-11",
		sex: "Мужчина",
		country:"Украина" 
	}
	var admin = userArr[0].login; 
	function Avtorization(){ // ф-ція авторизації
		var flag = false;
		var login = document.getElementById("AvtLogin").value; 
		var password = document.getElementById("AvtPass").value;  
		for (var i = 0; i < userArr.length; i++) // цикл перевірки, який визначає,чи є такий користувач і чи відповідає такому логіну його пароль
		{
			if (userArr[i].login === login && userArr[i].password === password)
			{
				currUser = login;
				if (currUser === admin){
		document.getElementById("adminRight").style.display = 'block'; 
		document.getElementById("MyP").innerHTML = "Администратор: " + login; 
}
 			else {
					document.getElementById("adminRight").style.display = 'none'; 
					document.getElementById("MyP").innerHTML = "Добро пожаловать, " + login; 
				}
				flag = true;
				break;
			}
			else flag = false;		
		}
		if (flag === true) 
			alert("Успешно");
		else alert("Неправильный логин или пароль, или же Вы не зарегистрированы");
	}

	function check(){ // ф-ція перевірки на правильність заповнення полів реєстрації
		var sel = document.getElementById("countries");
		var strUser = sel.options[sel.selectedIndex].text;
		var flag = false;
		for(i=0;i<=4;i++){ 
			if(a[i].value === ""){
				flag = true;
				if (i === 0)
					alert("Вы не ввели логин");
				else if (i === 1)
					alert("Вы не ввели пароль");
				else if (i === 2)
					alert("Вы не повторили пароль");
				else if (i === 3)
					alert("Вы не ввели email");
				else if (i === 4)
					alert("Вы не выбрали дату");
				}
		}
		for (var i = 0; i < userArr.length; i++) 
			if (a[0].value === userArr[i].login){
				flag = true;
				alert("Такой пользователь уже существует!");
			}
		for (var i = 0; i < deletedUsers.length; i++) 
			if (a[3].value === deletedUsers[i].email){
				flag = true;
				alert("Пользователь с таким EMAIL был заблокирован!");
			}
		if (a[1].value != a[2].value) 
		{
			flag = true;
			alert("Пароли не совпадают");
		}
		if (document.getElementById("male").checked === false && document.getElementById("female").checked === false) // перевірка на заповнення поля "стать"
		{
			flag = true;
			alert("Вы не выбрали пол");
		}
		if (strUser === "-- Выберите город --") 
		{
			flag = true;
			alert("Вы не выбрали город");
		}
		if (flag != true) 
			save();
	}
	function save(){ // збереження даних користувача
		var sel = document.getElementById("countries");
		var strUser = sel.options[sel.selectedIndex].text;
		var newUser = new Object(); // створюємо об'єкт - користувач
		newUser = {
			login: "", 
			password: "",
			email: "",
			date: 1,
			sex: "",
			country:""		
		}
		newUser.login = a[0].value; 
		newUser.password = a[1].value;
		newUser.email = a[3].value;
		newUser.date = a[4].value;

		if (document.getElementById("male").checked === true){ 
			newUser.sex = "Мужчина";
		}
		else newUser.sex = "Женщина";
		
		newUser.country = strUser; 
		userArr[userArr.length] = newUser;
		alert("Сохранено");	
	}
	function ShowMass(){ // виводимо інформацію про зареєстрованих користувачів(може переглянути лише адміністратор)
		if (currUser === admin)
			for (var i = 0; i < userArr.length; i++)
			{
				if (userArr[i].login != admin){
					alert(userArr[i].login);
					alert(userArr[i].password);
					alert(userArr[i].email);
					alert(userArr[i].date);
					alert(userArr[i].sex);
					alert(userArr[i].country);
					}
			}
	}
	function writeComment(){ // ф-ція запису коментарів в тимчасовий масив обробки коментарів адміністратором
		if (currUser === "" && document.getElementById("myTextarea").value != "")
			alert("Вы не авторизованы"); 
		else if(document.getElementById("myTextarea").value != ""){
		var newComment = new Object(); // створюємо об єкт - коментар
		newComment = {
			login: "",
			comment: "" ,
			date: "",
			id: null
		}
		newComment.login = currUser; 
		newComment.comment = document.getElementById("myTextarea").value;
		newComment.date = new Date();
		newComment.id = commentTempArr.length;
		commentTempArr[commentTempArr.length] = newComment; // додаємо коментар в масив тимчасових коментарів
		alert("Комментарий оставлен.");
		document.getElementById("myTextarea").value = "";
		
		}
		else{
			alert("Вы не ввели комментарий");
		}
	}
	function showComments(){ // показує власні коментарі користувача
		var str = ""; 
		for (var i = 0; i < commentArr.length; i++){
			if (commentArr[i].login === currUser)
				str +="Id: " + commentArr[i].id + "\nПользователь: " + commentArr[i].login + "\n" + "Дата: " + commentArr[i].date + "\n" + "Комментарий: "  + commentArr[i].comment  + "\n";
		}
		document.getElementById("readTextarea").value = str;
	}
	function showInfo(){ //показує інформацію про користувачів та їх коментарі(ті,що вже додані адміном) (ф-ція адміна)
			var str = ""; 
			for (var i = 0; i < userArr.length; i++){ // цикл виводу інформації про користувачів
				if (userArr[i].login != admin){
					str += "Логин: " + userArr[i].login + "\nПароль: " + userArr[i].password + "\nEmail: " + userArr[i].email + "\nДата рождения: " + userArr[i].date + "\nПол: " + userArr[i].sex + "\nГород: " + userArr[i].country + "\n-------------------\n";
					for (var j = 0; j < commentArr.length; j++){ // цикл виводу коментарів певного користувача
						if (commentArr[j].login === userArr[i].login)
							str += "Id: " + commentArr[j].id + "\nПользователь: " + commentArr[j].login + "\n" + "Дата: " + commentArr[j].date + "\n" + "Комментарий: "  + commentArr[j].comment  + "\n" ;
					}
				}
			}
			str+=" ---Заблокированные пользователи---\n" ;	
	for(var k = 0; k < deletedUsers.length; k++){ // цикл виводу заблокованих користувачів
				str += "Логин: " + deletedUsers[k].login+ "\nПароль: " + deletedUsers[k].password + "\nEmail: " + deletedUsers[k].email + "\nДата рождения: " + deletedUsers[k].date + "\nПол: " + deletedUsers[k].sex + "\nГород: " + deletedUsers[k].country + "\n---------------------\n";
			}
					
			document.getElementById("adminTextarea").value = str;
	}
	
	function removeComment(){ // ф-ція видалення коментаря
		var id = document.getElementById("removeComment1").value; 
		id = Number(id); // перетворення типів з стрінг в інт
		for (var i = 0; i < commentArr.length; i++){ // цикл пошуку коментаря по айді
			if (commentArr[i].id === id){ 
				commentArr.splice(i,1); 
				break;
			}
		}
	}
	
	function removeUser(){ // видалення користувача
		var flag = false;
		var loginOfDeletedUser = prompt("Введите логин пользователя, которого нужно заблокировать");
		if (loginOfDeletedUser === "admin") 
			alert("Нельзя заблокировать админа")
		else{
			for (var i = 0; i < userArr.length; i++){ 
		if (userArr[i].login === loginOfDeletedUser){ 
		deletedUsers[deletedUsers.length] = userArr[i]; 
		userArr.splice(i,1); 
		removeAllCommentByUser(loginOfDeletedUser);
					flag = true;
					break;
				}
			}
			if (!flag)
				alert("Пользователя с таким логином не существует");
			else alert("Пользователь " + loginOfDeletedUser + " заблокирован\nВсе комментарии этого пользователя удаленные");	
		}
	}
	
	function removeAllCommentByUser(login){ // ф-ція видалення всіх коментарів певного користувача
		for (var i = 0; i < commentArr.length; i++){ 
			if (commentArr[i].login === login){
				commentArr.splice(i,1);
				break;
			}
		}
		for (var i = 0; i < commentTempArr.length; i++){ 
			if (commentTempArr[i].login === login){
				commentTempArr.splice(i,1);
				break;
			}
		}
	}
	function showBuffComments(){ // виводимо тимчасові коментарі у спеціальне текстове поле
		var str = ""; 
			for (var j = 0; j < commentTempArr.length; j++){
				str += "Id: " + commentTempArr[j].id + "\nПользователь: " + commentTempArr[j].login + "\n" + "Дата: " + commentTempArr[j].date + "\n" + "Комментарий: "  + commentTempArr[j].comment  + "\n" ;
			}
		document.getElementById("buffTextarea").value = str;
	
	}
	
	function addComment(){ // додаємо коментар з тимчасового масиву в основний, тобто підтверджуємо його
		var id = document.getElementById("addCommentId").value;
		id = Number(id);
		for (var i = 0; i < commentTempArr.length; i++){
			if (commentTempArr[i].id === id){
				commentArr[commentArr.length] = commentTempArr[i];
				commentTempArr.splice(i,1);
				break;
			}
		}
	}