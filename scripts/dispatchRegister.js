// Webcam

Webcam.set({
  width: 400,
  height: 300,
  image_format: "jpeg",
  jpeg_quality: 90,
});

Webcam.attach("#my_camera");

function take_snapshot() {
  // play sound effect
  //shutter.play();
  // take snapshot and get image data
  Webcam.snap(function (data_uri) {
    // display results in page
    document.getElementById("results").innerHTML =
      '<img id = "webcam" src = "' + data_uri + '"/>';
  });
}
// Webcam.reset();

function saveSnap() {
  console.log("working");
  var base64image = document.getElementById("webcam").src;
  Webcam.upload(base64image, "function.php", function (code, text) {
    alert("Saved successfully");
    // document.location.href = "image.php"
  });
}

// Disable button once clicked to avoid duplication
