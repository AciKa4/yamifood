function ajax(url,method,dataType="json",data,success,error,contentType = "application/x-www-form-urlencoded; charset=UTF8", processData = true){
    $.ajax({
        url: url,
        method:method,
        dataType:dataType,
        data:data,
        success:success,
        error:error,
        contentType: contentType,
        processData: processData
    });
}
