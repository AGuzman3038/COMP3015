const API_KEY = "f15172985807f02488411d49449a9d5c"; // Reemplaza esto con tu API key

$(document).ready(function () {
    $("#checkWeather").click(function () {
        let city = $("#location").val();
        $.ajax({
            url:`https://api.openweathermap.org/data/2.5/forecast?q=${city}&units=imperial&appid=${API_KEY}`,
            type: "GET",
            dataType: "json",
            success: function (data) {
                let forecastHtml = "<h5>Pronóstico de 7 días:</h5>";
                data.list.forEach((day) => {
                    forecastHtml += `<strong>Fecha:</strong> 
                    ${new Date(day.dt * 1000).toDateString()} ${new Date(day.dt * 1000).toTimeString()}
                    <br><strong>Temperatura:</strong>
                    ${day.main.temp}°F <br>
                    <strong>Descripción:</strong> 
                    ${day.weather[0].description} 
                    <br><hr>`;
                });
                $("#weatherResult").html(forecastHtml);},error: function () {
                    $("#weatherResult").html("<p>Error al obtener el clima. Por favor, inténtalo de nuevo.</p>");
                },
            });
        });
    }
);