function showFriendsFace() {
    alert("0k");
    console.log("ok con de");
    pc.createOffer()
        .then(offer => pc.setLocalDescription(offer))
        .then(() => sendMessage(hoang, JSON.stringify({ 'sdp': pc.localDescription })));
}