var docReady = setInterval(function() {
  if (document.readyState != "complete") {
    return;
  }
  clearInterval(docReady);
  document.getElementsByClassName('btn')[0].addEventListener('click', createNewCategory);

}, 100);

function createNewCategory(event) {
  event.preventDefault();
  var name = event.target.previousElementSibling.value;
  if (name.Length === 0) {
    alert("Please enter a valid category name");
    return;
  }
  ajax("POST", "/admin/blog/category/create", "name=" + name, newCategoryCreated, [name]);
}

function newCategoryCreated(params, success, responseObj) {
  location.reload();
}

function ajax(method, url, params, callback, callbackParams) {
  var http;

  if (window.XMLHttpRequest) {
    http = new XMLHttpRequest();
  } else {
    http = new ActiveXObject("Microsoft.XMLHTTP");
  }

  http.onreadystatechange = function() {
    var obj;
    if (http.readyState == XMLHttpRequest.DONE) {

      if (http.status == 200) {
        obj = JSON.parse(http.responseText);
        callback(callbackParams, true, obj);
      } else if (http.status == 400) {
        alert('Category could not be saved. Please try again.');
        callback(callbackParams, false);
      } else {
        obj = JSON.parse(http.responseText);
        if (obj.message) {
          alert(obj.message);
        } else if (obj.name) {
          alert(obj.name);
        } else {
          alert("please check the name");
        }
      }
    }
  };
  http.open(method, baseUrl + url, true);
  http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  http.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  console.log(params);
  http.send(params + "&_token=" + token);

}
