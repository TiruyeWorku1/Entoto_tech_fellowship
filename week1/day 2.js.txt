// var weatherTemepreture = 40

// console.log (weatherTemepreture)

// if (weatherTemepreture < 10) {
//     console.log ("it's cold outside")
//  }
// else if (weatherTemepreture > 20) {
//     console.log ("it's warm outside")
//  }
// else {
//     console.log ("it's nice weather")
//  }



function weatherTemepreture(weather){

//console.log (weatherTemepreture)

if (weather < 10) {
    return ("it's cold outside")
 }
else if (weather > 20) {
    return ("it's warm outside")
 }
else {
    return ("it's nice weather")
 }
}
  
  console.log(weatherTemepreture(40))