<html>
<head>

  <script src="https://www.gstatic.com/firebasejs/8.2.9/firebase-app.js"></script>
  <!-- <script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

  <style type="text/css">
    video {
    background-color: #ddd;
    border-radius: 7px;
    margin: 10px 0px 0px 10px;
    width: 320px;
    height: 240px;
    }
    button {
    margin: 5px 0px 0px 10px !important;
    width: 654px;
    }
  </style>
 
</head>

<body onload="showMyFace()">

  <video id="yourVideo" autoplay muted></video>
  <video id="friendsVideo" autoplay></video>
  <br />
  <button onclick="showFriendsFace()" type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Call</button>

  <script type="text/javascript">

    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyASS7i71JugDYlmx2bu10eSXJ1Ce8bZjMg",
        authDomain: "webrtc-9534e.firebaseapp.com",
        projectId: "webrtc-9534e",
        storageBucket: "webrtc-9534e.appspot.com",
        messagingSenderId: "483860317977",
        appId: "1:483860317977:web:e0fbba278dc1010474e788"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);


    // var config = {
    // apiKey: " AIzaSyASS7i71JugDYlmx2bu10eSXJ1Ce8bZjMg",
    // authDomain: " webrtc-9534e.firebaseapp.com",
    // databaseURL: " https://<DATABASE_NAME>.firebaseio.com",
    // projectId: " webrtc-9534e",
    // storageBucket: " <BUCKET>.appspot.com",
    // messagingSenderId: " <SENDER_ID>"
    // };
    // firebase.initializeApp(config);

    var database = firebase.database().ref();
    var yourVideo = document.getElementById("yourVideo");
    var friendsVideo = document.getElementById("friendsVideo");
    var yourId = Math.floor(Math.random()*1000000000);
    var servers = {'iceServers': [{'urls': 'stun:stun.services.mozilla.com'}, {'urls': 'stun:stun.l.google.com:19302'}, {'urls': 'turn:numb.viagenie.ca','credential': 'webrtc','username': 'websitebeaver@mail.com'}]};
    var pc = new RTCPeerConnection(servers);
    pc.onicecandidate = (event => event.candidate?sendMessage(yourId, JSON.stringify({'ice': event.candidate})):console.log("Sent All Ice") );
    pc.onaddstream = (event => friendsVideo.srcObject = event.stream);
    function sendMessage(senderId, data) {
    var msg = database.push({ sender: senderId, message: data });
    msg.remove();
    }
    function readMessage(data) {
    var msg = JSON.parse(data.val().message);
    var sender = data.val().sender;
    if (sender != yourId) {
    if (msg.ice != undefined)
    {
    pc.addIceCandidate(new RTCIceCandidate(msg.ice));
    }
    else if (msg.sdp.type == "offer")
    {
    var r = confirm("Answer call?");
    if (r == true) {
    pc.setRemoteDescription(new RTCSessionDescription(msg.sdp))
    .then(() => pc.createAnswer())
    .then(answer => pc.setLocalDescription(answer))
    .then(() => sendMessage(yourId, JSON.stringify({'sdp': pc.localDescription})));
    } else {
    alert("Rejected the call");
    }
    }
    else if (msg.sdp.type == "answer")
    {
    pc.setRemoteDescription(new RTCSessionDescription(msg.sdp));
    }
    }
    };
    database.on('child_added', readMessage);
    function showMyFace() {
    navigator.mediaDevices.getUserMedia({audio:true, video:true})
    .then(stream => yourVideo.srcObject = stream)
    .then(stream => pc.addStream(stream));
    }
    function showFriendsFace() {
    alert("dume");
    console.log("ok con de");
    pc.createOffer()
        .then(offer => pc.setLocalDescription(offer))
        .then(() => sendMessage(yourVideo, JSON.stringify({ 'sdp': pc.localDescription })));
    }
</script>
  <!-- <script src="/demo.js"></script> -->
</body>
</html>