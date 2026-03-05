<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&family=Fira+Code&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #05040a; color: white; overflow: hidden; }
        .glass { background: rgba(255, 255, 255, 0.02); backdrop-filter: blur(20px); border: 1px solid rgba(255, 255, 255, 0.08); }
        .active-view { display: block !important; animation: fadeIn 0.4s ease-out; }
        .nav-active { background: linear-gradient(90deg, rgba(255,0,122,0.1) 0%, transparent 100%); border-left: 4px solid #ff007a; color: white !important; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: #1a1a2e; border-radius: 10px; }
    </style>
</head>
<body class="h-screen flex">

    <aside class="w-72 bg-[#08070e] border-r border-white/5 flex flex-col p-6 z-50">
        <div class="flex items-center gap-3 mb-12 px-2">
            <div class="w-8 h-8 bg-gradient-to-tr from-[#ff007a] to-[#00f2ff] rounded-lg shadow-lg shadow-pink-500/20"></div>
            <span class="text-2xl font-black tracking-tighter italic">PRISM</span>
        </div>

        <nav class="flex-1 space-y-2">
            <button onclick="navigate('dashboard')" id="link-dashboard" class="nav-btn w-full flex items-center gap-3 p-4 rounded-xl text-gray-500 hover:bg-white/5 transition nav-active">
                <span>🏠</span> Dashboard
            </button>
            <button onclick="navigate('playground')" id="link-playground" class="nav-btn w-full flex items-center gap-3 p-4 rounded-xl text-gray-500 hover:bg-white/5 transition">
                <span>🎮</span> Playground
            </button>
            <button onclick="navigate('config')" id="link-config" class="nav-btn w-full flex items-center gap-3 p-4 rounded-xl text-gray-500 hover:bg-white/5 transition">
                <span>⚙️</span> API Config
            </button>
        </nav>

        <div class="mt-auto p-4 glass rounded-2xl border-white/5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-600 to-fuchsia-600 border border-white/10"></div>
                <div class="overflow-hidden">
                    <p class="text-xs font-bold truncate">Vikas Kumar</p>
                    <p class="text-[9px] text-pink-500 font-black tracking-widest uppercase">Admin Mode</p>
                </div>
            </div>
        </div>
    </aside>

    <main class="flex-1 flex flex-col overflow-hidden relative">
        
        <header class="h-20 border-b border-white/5 flex items-center justify-between px-10 bg-black/20 backdrop-blur-md">
            <div id="page-title" class="text-lg font-bold italic tracking-tight">System Overview</div>
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                    <span class="text-[10px] font-bold text-gray-400">SERVER: ONLINE</span>
                </div>
                <button class="bg-[#ff007a] hover:bg-[#e6006e] px-6 py-2.5 rounded-xl text-xs font-black uppercase tracking-widest transition-all">Deploy +</button>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto p-10">

            <section id="view-dashboard" class="view active-view space-y-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="glass p-8 rounded-[2.5rem] border-white/5 hover:border-cyan-400/30 transition">
                        <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest">Total API Calls</p>
                        <h2 class="text-5xl font-black mt-2 italic">1.2M</h2>
                    </div>
                    <div class="glass p-8 rounded-[2.5rem] border-white/5 hover:border-pink-500/30 transition">
                        <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest">Token Burn Rate</p>
                        <h2 class="text-5xl font-black mt-2 text-[#ff007a] italic">84.2k</h2>
                    </div>
                    <div class="glass p-8 rounded-[2.5rem] border-white/5">
                        <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest">Avg Response</p>
                        <h2 class="text-5xl font-black mt-2 text-cyan-400 italic">102<span class="text-sm">ms</span></h2>
                    </div>
                </div>

                <div class="glass rounded-[3rem] p-10 border-white/5">
                    <h3 class="text-xl font-bold mb-8 italic">Live Inference Logs</h3>
                    <div class="space-y-4 font-mono text-[11px]">
                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5 group hover:bg-white/10 transition">
                            <span class="text-pink-500">POST <span class="text-white">/v1/prism/chat</span></span>
                            <span class="text-cyan-400">Success (200)</span>
                            <span class="text-gray-500">Just now</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5 group hover:bg-white/10 transition">
                            <span class="text-pink-500">POST <span class="text-white">/v1/prism/voice</span></span>
                            <span class="text-cyan-400">Success (200)</span>
                            <span class="text-gray-500">4 mins ago</span>
                        </div>
                    </div>
                </div>
            </section>

            <section id="view-playground" class="view hidden h-full flex flex-col lg:flex-row gap-8">
                <div class="flex-1 glass rounded-[3rem] flex flex-col overflow-hidden border-white/10">
                    <div id="chat-stream" class="flex-1 overflow-y-auto p-10 space-y-6">
                        <div class="max-w-[80%] bg-white/5 p-6 rounded-3xl rounded-tl-none border border-white/10 text-sm leading-relaxed">
                            Aapka swagat hai! Prism Playground ab aapke Laravel environment se synced hai. Koi bhi prompt enter karke response test kijiye.
                        </div>
                    </div>
                    <div class="p-8 bg-black/40 border-t border-white/5 flex gap-4">
                        <input type="text" id="chat-input" placeholder="Enter instructions..." class="flex-1 bg-white/5 border border-white/10 p-5 rounded-2xl outline-none focus:border-[#ff007a] transition-all">
                        <button onclick="sendMessage()" class="bg-[#ff007a] px-8 rounded-2xl font-black uppercase text-xs hover:scale-105 transition active:scale-95">Run ↗</button>
                    </div>
                </div>
                <div class="w-full lg:w-80 glass p-8 rounded-[3rem]">
                    <h4 class="text-xs font-black text-gray-500 uppercase mb-8 tracking-widest">Model Config</h4>
                    <div class="space-y-6">
                        <div>
                            <label class="text-[10px] text-cyan-400 font-bold block mb-2 uppercase">Engine</label>
                            <select class="w-full bg-white/5 border border-white/10 rounded-xl p-3 text-xs outline-none">
                                <option>Claude 3.5 Sonnet</option>
                                <option>GPT-4o (OpenAI)</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-[10px] text-gray-500 font-bold block mb-2 uppercase">Temperature</label>
                            <input type="range" class="w-full accent-[#ff007a]">
                        </div>
                    </div>
                </div>
            </section>

            <section id="view-config" class="view hidden space-y-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="glass p-10 rounded-[3rem] border-t-4 border-[#00f2ff]">
                        <h3 class="text-xl font-bold mb-8">OpenAI Integration</h3>
                        <label class="text-[10px] text-gray-500 font-bold block mb-2 uppercase">API Key</label>
                        <input type="password" value="sk-prism-xxxxxxxxxxxx" class="w-full bg-black/50 border border-white/10 p-4 rounded-xl text-xs mb-6 outline-none focus:border-cyan-400">
                        <button class="w-full py-4 rounded-2xl border border-white/10 text-[10px] font-black uppercase tracking-widest hover:bg-white/5 transition">Verify Connection</button>
                    </div>
                    <div class="glass p-10 rounded-[3rem] border-t-4 border-[#ff007a]">
                        <h3 class="text-xl font-bold mb-8">Anthropic Integration</h3>
                        <label class="text-[10px] text-gray-500 font-bold block mb-2 uppercase">API Key</label>
                        <input type="password" value="sk-ant-xxxxxxxxxxxx" class="w-full bg-black/50 border border-white/10 p-4 rounded-xl text-xs mb-6 outline-none focus:border-pink-500">
                        <button class="w-full py-4 rounded-2xl border border-white/10 text-[10px] font-black uppercase tracking-widest hover:bg-white/5 transition">Verify Connection</button>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <script>
        // Navigation Switcher
        function navigate(viewId) {
            // Reset Views
            document.querySelectorAll('.view').forEach(v => v.classList.add('hidden'));
            document.querySelectorAll('.view').forEach(v => v.classList.remove('active-view'));
            
            // Reset Sidebar
            document.querySelectorAll('.nav-btn').forEach(b => b.classList.remove('nav-active'));

            // Set Active
            document.getElementById('view-' + viewId).classList.remove('hidden');
            document.getElementById('view-' + viewId).classList.add('active-view');
            document.getElementById('link-' + viewId).classList.add('nav-active');

            // Update Header
            const labels = { 'dashboard': 'System Overview', 'playground': 'Neural Playground', 'config': 'Provider Settings' };
            document.getElementById('page-title').innerText = labels[viewId];
        }

        // Playground Chat Logic
        function sendMessage() {
            const input = document.getElementById('chat-input');
            const stream = document.getElementById('chat-stream');
            if(!input.value) return;

            stream.innerHTML += `<div class="max-w-[80%] ml-auto bg-[#ff007a]/10 p-6 rounded-3xl rounded-tr-none border border-[#ff007a]/20 text-sm">${input.value}</div>`;
            input.value = "";

            setTimeout(() => {
                stream.innerHTML += `<div class="max-w-[80%] bg-white/5 p-6 rounded-3xl rounded-tl-none border border-white/10 text-sm italic">Processing via Prism Engine... Done!</div>`;
                stream.scrollTop = stream.scrollHeight;
            }, 1000);
            stream.scrollTop = stream.scrollHeight;
        }
    </script>
</body>
</html>