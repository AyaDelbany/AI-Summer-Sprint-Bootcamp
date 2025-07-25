<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pharmacy Website</title>
  <script src="https://unpkg.com/lucide@latest"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <style>
    html {
      scroll-behavior: smooth;
    }
     

  </style>
</head>



  <!-- Navigation Bar -->
  <nav class="fixed top-0 left-0 right-0 bg-white shadow-md z-50 px-6 md:px-16 py-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-800">Our Pharmacy</h1>
    <ul class="hidden md:flex space-x-6 text-blue-700 font-semibold">
      <li><a href="#home" class="hover:text-blue-500">Home</a></li>
      <li><a href="#about" class="hover:text-blue-500">About</a></li>
      <li><a href="#services" class="hover:text-blue-500">Services</a></li>
      <li><a href="#testimonials" class="hover:text-blue-500">Testimonials</a></li>
      <li><a href="#contact" class="hover:text-blue-500">Contact</a></li>
    </ul>
  </nav>

  <!-- Hero Section -->
  <section id="home" class="relative bg-cover bg-center h-screen flex items-center justify-center text-center text-white px-6" style="background-image: url('pharmacist-work.jpg');">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-500/60"></div>
    <div class="relative z-10">
      <h1 class="text-5xl md:text-7xl font-extrabold mb-6 drop-shadow-md">Welcome to Our Pharmacy</h1>
      <p class="text-xl md:text-2xl mb-8 max-w-2xl leading-relaxed">Your health is our priority. Professional care, always available.</p>
      <a href="#contact" class="bg-white text-blue-600 font-bold py-3 px-8 rounded-full shadow-xl hover:bg-blue-100 hover:scale-105 transition-all duration-300">Get Started</a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-20 px-6 md:px-16 bg-white text-center" data-aos="fade-up">
    <h2 class="text-4xl font-bold text-blue-800 mb-6">Why Choose Us?</h2>
    <p class="max-w-3xl mx-auto text-lg text-gray-700">We offer fast, friendly, and reliable pharmacy services to our community.</p>
    <div class="mt-10 grid md:grid-cols-3 gap-8">
      <div class="p-6 bg-blue-50 rounded-xl shadow-md hover:shadow-xl transition">
        <i data-lucide="smile" class="w-10 h-10 text-blue-600 mx-auto mb-4"></i>
        <h3 class="text-xl font-semibold text-blue-700 mb-2">Friendly Staff</h3>
        <p class="text-gray-600">Always ready to assist you with a smile.</p>
      </div>
      <div class="p-6 bg-blue-50 rounded-xl shadow-md hover:shadow-xl transition">
        <i data-lucide="clock" class="w-10 h-10 text-blue-600 mx-auto mb-4"></i>
        <h3 class="text-xl font-semibold text-blue-700 mb-2">Fast Service</h3>
        <p class="text-gray-600">No long waits. Just quick service.</p>
      </div>
      <div class="p-6 bg-blue-50 rounded-xl shadow-md hover:shadow-xl transition">
        <i data-lucide="shield-check" class="w-10 h-10 text-blue-600 mx-auto mb-4"></i>
        <h3 class="text-xl font-semibold text-blue-700 mb-2">Trusted & Secure</h3>
        <p class="text-gray-600">Complete confidentiality guaranteed.</p>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section id="services" class="py-20 px-6 md:px-16 bg-blue-50 text-center" data-aos="fade-up">
    <h2 class="text-4xl font-bold text-blue-800 mb-10">Our Services</h2>
    <div class="grid md:grid-cols-3 gap-8">
      <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
        <i data-lucide="file-text" class="w-10 h-10 text-blue-600 mx-auto mb-4"></i>
        <h3 class="text-xl font-semibold text-blue-700 mb-2">Prescription Refill</h3>
        <p class="text-gray-600">Quick and secure refills anytime.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
        <i data-lucide="syringe" class="w-10 h-10 text-blue-600 mx-auto mb-4"></i>
        <h3 class="text-xl font-semibold text-blue-700 mb-2">Vaccinations</h3>
        <p class="text-gray-600">Flu, COVID-19, and travel vaccines.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition">
        <i data-lucide="headset" class="w-10 h-10 text-blue-600 mx-auto mb-4"></i>
        <h3 class="text-xl font-semibold text-blue-700 mb-2">Consultation</h3>
        <p class="text-gray-600">Get advice from professionals.</p>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section id="testimonials" class="py-20 px-6 md:px-16 bg-white text-center" data-aos="zoom-in">
    <h2 class="text-4xl font-bold text-blue-800 mb-10">What Our Clients Say</h2>
    <div class="grid md:grid-cols-2 gap-8">
      <div class="bg-blue-50 p-6 rounded-xl shadow-md">
        <p class="text-gray-700 italic">“Amazing service and the friendliest staff!”</p>
        <h4 class="mt-4 font-semibold text-blue-700">– Leila H.</h4>
      </div>
      <div class="bg-blue-50 p-6 rounded-xl shadow-md">
        <p class="text-gray-700 italic">“Got my flu shot quickly. Super professional.”</p>
        <h4 class="mt-4 font-semibold text-blue-700">– Omar D.</h4>
      </div>
    </div>
  </section>

  <!-- Newsletter + Contact -->
  <section id="contact" class="py-20 px-6 md:px-16 bg-blue-600 text-white text-center" data-aos="fade-up">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">Stay Updated</h2>
    <p class="mb-6">Subscribe for latest news & offers</p>
    <form class="flex flex-col md:flex-row gap-4 justify-center">
      <input type="email" placeholder="Enter your email" class="px-4 py-2 rounded-full text-gray-800 w-full md:w-1/3" />
      <button class="bg-white text-blue-600 px-6 py-2 rounded-full font-semibold hover:bg-gray-100">Subscribe</button>
    </form>
  </section>

  <section class="py-20 px-6 md:px-16 bg-white text-center" data-aos="fade-up">
    <h2 class="text-4xl font-bold text-blue-800 mb-6">Get In Touch</h2>
    <p class="max-w-2xl mx-auto text-lg text-gray-700 mb-8">Need help? We're here.</p>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="text-blue-700">
        <i data-lucide="mail" class="w-8 h-8 mx-auto mb-2"></i>
        <p>info@pharmacy.com</p>
      </div>
      <div class="text-blue-700">
        <i data-lucide="phone" class="w-8 h-8 mx-auto mb-2"></i>
        <p>+961 1 234 567</p>
      </div>
      <div class="text-blue-700">
        <i data-lucide="map-pin" class="w-8 h-8 mx-auto mb-2"></i>
        <p>Beirut, Lebanon</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-blue-900 text-white text-center py-8">
    <p>&copy; 2025 Our Pharmacy. All rights reserved.</p>
    <div class="flex justify-center space-x-4 mt-2">
      <a href="#" class="hover:text-blue-300">Privacy Policy</a>
      <a href="#" class="hover:text-blue-300">Terms</a>
      <a href="#" class="hover:text-blue-300">Contact</a>
    </div>
  </footer>
<!-- Chatbot Toggle Button -->
<button id="chatToggleBtn" onclick="toggleChat()" class="fixed bottom-6 right-6 z-50 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-full shadow-lg transition-all">
  💬
</button>

<!-- Chat Window -->
<div id="chatWindow" class="fixed bottom-24 right-6 w-80 md:w-96 hidden flex flex-col bg-white border rounded-2xl shadow-2xl overflow-hidden z-50">
  <div class="bg-blue-600 text-white p-4 font-semibold text-lg">Pharmacy Chat</div>
  <div id="chatMessages" class="flex-1 p-4 space-y-2 overflow-y-auto h-64 text-sm text-gray-800 bg-gray-50"></div>
  
  <!-- Message input and buttons -->
  <div class="p-2 border-t flex items-center gap-2">
    <input id="chatInput" type="text" placeholder="Type your message..." class="flex-1 border border-gray-300 rounded-full px-4 py-2 text-sm focus:outline-none" />
    <button onclick="sendMessage()" class="bg-blue-600 text-white px-4 py-2 rounded-full hover:bg-blue-700">Send</button>
    <button id="imageBtn" title="Upload Prescription" class="bg-green-500 text-white px-2 py-2 rounded-full hover:bg-green-600">📷</button>
    <button id="voiceBtn" title="Record Voice" class="bg-purple-500 text-white px-2 py-2 rounded-full hover:bg-purple-600">🎤</button>
  </div>

  <!-- Hidden file input for image upload -->
  <input type="file" id="prescriptionInput" accept="image/*" style="display: none;" />
</div>

<script>
  AOS.init();

  // Toggle chat window visibility
  function toggleChat() {
    document.getElementById("chatWindow").classList.toggle("hidden");
  }

  // Send text message
  function sendMessage() {
    const input = document.getElementById("chatInput");
    const messages = document.getElementById("chatMessages");
    const userMessage = input.value.trim();
    if (userMessage === "") return;

    // Show user message bubble
    const userBubble = document.createElement("div");
    userBubble.className = "bg-blue-100 p-2 rounded-xl self-end max-w-xs ml-auto";
    userBubble.innerText = userMessage;
    messages.appendChild(userBubble);

    // Call chatbot.php backend
    fetch("chatbot.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ message: userMessage }),
    })
      .then(res => res.json())
      .then(data => {
        // Show bot reply bubble
        const botBubble = document.createElement("div");
        botBubble.className = "bg-gray-200 p-2 rounded-xl self-start max-w-xs";
        botBubble.innerText = data.reply;
        messages.appendChild(botBubble);
        messages.scrollTop = messages.scrollHeight;
      })
      .catch(() => {
        const errorBubble = document.createElement("div");
        errorBubble.className = "bg-red-100 p-2 rounded-xl self-start max-w-xs";
        errorBubble.innerText = "Error contacting server.";
        messages.appendChild(errorBubble);
      });

    input.value = "";
    messages.scrollTop = messages.scrollHeight;
  }

  // Image upload logic
  const imageBtn = document.getElementById("imageBtn");
  const prescriptionInput = document.getElementById("prescriptionInput");

  imageBtn.addEventListener("click", () => {
    prescriptionInput.click();
  });

  prescriptionInput.addEventListener("change", () => {
    const file = prescriptionInput.files[0];
    if (!file) return;

    const formData = new FormData();
    formData.append("prescription_image", file);

    fetch("upload_prescription.php", {
      method: "POST",
      body: formData
    })
    .then(res => res.text())
    .then(response => {
      const messages = document.getElementById("chatMessages");
      const bubble = document.createElement("div");
      bubble.className = "bg-green-100 p-2 rounded-xl self-start max-w-xs";
      bubble.innerText = "📸 Prescription image uploaded!";
      messages.appendChild(bubble);
      messages.scrollTop = messages.scrollHeight;
      prescriptionInput.value = ""; // Reset input
    })
    .catch(() => alert("Error uploading prescription image."));
  });

  // Voice recording logic
  const voiceBtn = document.getElementById("voiceBtn");
  let isRecording = false;
  let mediaRecorder;
  let audioChunks = [];

  voiceBtn.addEventListener("click", async () => {
    if (!isRecording) {
      if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
        alert("Your browser does not support audio recording.");
        return;
      }
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        mediaRecorder = new MediaRecorder(stream);
        audioChunks = [];

        mediaRecorder.addEventListener("dataavailable", event => {
          audioChunks.push(event.data);
        });

        mediaRecorder.addEventListener("stop", () => {
          const audioBlob = new Blob(audioChunks, { type: 'audio/webm' });
          uploadAudio(audioBlob);
        });

        mediaRecorder.start();
        isRecording = true;
        voiceBtn.textContent = "⏹️ Stop Recording";
      } catch (err) {
        alert("Could not start audio recording: " + err.message);
      }
    } else {
      mediaRecorder.stop();
      isRecording = false;
      voiceBtn.textContent = "🎤";
    }
  });

  function uploadAudio(blob) {
    const formData = new FormData();
    formData.append("voice_message", blob, "recorded_audio.webm");

    fetch("upload_voice.php", {
      method: "POST",
      body: formData
    })
      .then(res => res.text())
      .then(response => {
        const messages = document.getElementById("chatMessages");
        const bubble = document.createElement("div");
        bubble.className = "bg-purple-100 p-2 rounded-xl self-start max-w-xs";
        bubble.innerText = "🎤 Voice message uploaded!";
        messages.appendChild(bubble);
        messages.scrollTop = messages.scrollHeight;
      })
      .catch(() => {
        alert("Error uploading voice message.");
      });
  }
</script>




</body>

</html>
