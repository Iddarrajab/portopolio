<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Clean Minimalist Portfolio Dashboard</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0f2cbd",
                        "accent": "#4f46e5",
                        "background-light": "#fdfdfe",
                        "background-dark": "#0f172a",
                    },
                    fontFamily: {
                        "sans": ["Inter", "sans-serif"]
                    }
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        @layer base {

        }
        @media (min-width: 1024px) {
            .desktop-viewport {
                width: 1920px;
                height: 1200px;
                overflow-y: auto;
                margin: 0 auto;
                position: relative;
                background-color: #fdfdfe;
                box-shadow: 0 40px 100px -20px rgb(0 0 0 / 0.1);
            }
        }
    </style>
    <style>
        body {
            min-height: max(884px, 100dvh);
        }
    </style>
</head>

<body class="min-h-screen bg-background-light text-slate-900">

    <div class="bg-background-light text-slate-900">

        <!-- NAVBAR -->
        <nav class="sticky top-0 h-20 lg:h-24 bg-white/70 backdrop-blur-xl border-b border-slate-100 px-6 lg:px-24 flex items-center justify-between z-50">

            <div class="flex items-center gap-4">
                <div class="size-9 bg-primary rounded-lg flex items-center justify-center">
                    <span class="material-symbols-outlined text-white text-lg">code</span>
                </div>

                <div>
                    <a href="{{ route('login.form') }}" class="text-base font-bold tracking-tight">Iddar</a>
                    <p class="text-[9px] font-bold text-slate-400 uppercase tracking-[0.2em] leading-none">Developer</p>
                </div>
            </div>

            <!-- menu laptop -->
            <div class="hidden lg:flex items-center gap-12">
                <a class="text-xs font-bold text-primary uppercase" href="#home">Home</a>
                <a class="text-xs text-slate-500 hover:text-primary uppercase" href="#experience">Experience</a>
                <a class="text-xs text-slate-500 hover:text-primary uppercase" href="#skills">Skills</a>
                <a class="text-xs text-slate-500 hover:text-primary uppercase" href="#projects">
                    Projects ({{ $project->count() }})
                </a>
                <a class="text-xs text-slate-500 hover:text-primary uppercase" href="#contact">Contact</a>
            </div>

            <a href="{{ asset('storage/cv/Muhammad-Iddar-Rajab-CV.pdf') }}"
                download
                class="border border-slate-200 text-slate-700 px-4 lg:px-6 py-2 rounded-full text-xs font-bold hover:bg-slate-50">
                Download CV
            </a>

        </nav>


        <!-- HERO -->
        <section id="home" class="flex flex-col lg:flex-row items-center px-6 lg:px-24 py-16 lg:h-[550px]">

            <div class="w-full lg:w-7/12 text-center lg:text-left">

                <span class="text-primary font-bold tracking-[0.3em] uppercase text-[10px] mb-6 block">
                    Product Engineer
                </span>

                <h2 class="text-4xl lg:text-7xl font-light mb-8 tracking-tight leading-[1.1]">
                    Fullstack Developer
                </h2>

                <p class="text-slate-500 leading-relaxed text-base lg:text-lg font-light">
                    Berfokus pada <span class="text-slate-900 font-medium">pengembangan sistem web yang skalabel</span>.
                </p>

                <div class="flex justify-center lg:justify-start gap-4 mt-6">

                    <a class="bg-primary text-white px-6 lg:px-10 py-3 lg:py-4 rounded-full text-sm font-bold shadow-lg">
                        View Projects
                    </a>

                    <a class="flex items-center gap-2 text-slate-400 hover:text-primary text-sm font-bold px-4">
                        Let's Talk
                    </a>

                </div>

            </div>


            <div class="w-full lg:w-5/12 flex justify-center mt-10 lg:mt-0">

                <div class="size-52 lg:size-80 rounded-full border-8 border-white shadow-2xl overflow-hidden">

                    @php
                    $photoUrl = asset('storage/photos/pofil.jpeg');
                    @endphp

                    <div
                        class="w-full h-full bg-cover bg-center"
                        style="background-image: url('{{ $photoUrl }}')">
                    </div>

                </div>

            </div>

        </section>


        <!-- MAIN -->
        <div class="flex flex-col lg:flex-row border-t border-slate-100">

            <!-- SIDEBAR -->
            <div class="w-full lg:w-[600px] border-b lg:border-b-0 lg:border-r border-slate-100 p-8 lg:p-24 space-y-16 lg:space-y-24">


                <!-- EXPERIENCE -->
                <section id="experience">

                    <span class="text-[10px] font-black uppercase tracking-[0.25em] text-slate-300">
                        Experience
                    </span>

                    <div class="mt-10 grid grid-cols-2 gap-8">

                        <div>
                            <p class="text-[10px] font-bold text-slate-300 uppercase">Years</p>
                            <p class="text-2xl font-light">08+</p>
                        </div>

                        <div>
                            <p class="text-[10px] font-bold text-slate-300 uppercase">Projects</p>
                            <p class="text-2xl font-light">{{ $project->count() }}</p>
                        </div>

                    </div>

                </section>


                <!-- SKILLS -->
                <section id="skills">

                    <span class="text-[10px] font-black uppercase tracking-[0.25em] text-slate-300">
                        Technical Skills
                    </span>

                    <div class="space-y-4 mt-6">

                        <div class="flex justify-between border-b py-2">
                            <span>Laravel / PHP</span>
                            <span class="text-xs text-slate-400">Intermediate</span>
                        </div>

                        <div class="flex justify-between border-b py-2">
                            <span>React / JavaScript</span>
                            <span class="text-xs text-slate-400">Intermediate</span>
                        </div>

                        <div class="flex justify-between border-b py-2">
                            <span>Tailwind CSS</span>
                            <span class="text-xs text-slate-400">Intermediate</span>
                        </div>

                        <div class="flex justify-between border-b py-2">
                            <span>PostgreSQL</span>
                            <span class="text-xs text-slate-400">Intermediate</span>
                        </div>

                        <div class="flex justify-between border-b py-2">
                            <span>Node.js</span>
                            <span class="text-xs text-slate-400">Intermediate</span>
                        </div>

                    </div>

                </section>

            </div>


            <!-- PROJECT -->
            <section id="projects" class="flex-1 p-6 lg:p-24">

                <div class="space-y-4 lg:space-y-6 max-h-[900px] overflow-y-auto">

                    @forelse($project as $item)

                    <div class="group bg-white rounded-2xl lg:rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition">

                        <div class="flex flex-col lg:flex-row gap-4 lg:gap-8 p-4 lg:p-6">

                            <div class="w-full lg:size-44 h-40 lg:h-44 rounded-xl bg-slate-100 overflow-hidden">

                                @if($item->foto)
                                <img src="{{ asset('storage/photos/' . $item->foto) }}"
                                    class="w-full h-full object-cover">
                                @endif

                            </div>

                            <div class="flex flex-col justify-center">

                                <span class="text-[9px] font-bold text-primary uppercase tracking-widest mb-2">
                                    Project
                                </span>

                                <h4 class="text-lg lg:text-2xl font-bold text-slate-900 mb-2">
                                    {{ $item->nama_project }}
                                </h4>

                                <a href="{{ $item->link }}" target="_blank"
                                    class="text-xs font-bold text-slate-400 hover:text-primary flex items-center gap-1">
                                    Case Study
                                </a>

                            </div>

                        </div>

                    </div>

                    @empty

                    <p class="text-slate-400 text-center">
                        Belum ada project
                    </p>

                    @endforelse

                </div>

            </section>

        </div>


        <!-- CONTACT -->
        <section id="contact" class="px-6 lg:px-24 py-20 lg:py-32 bg-slate-900 text-white">

            <div class="max-w-4xl mx-auto flex flex-col lg:flex-row gap-16 lg:gap-24">

                <div class="w-full lg:w-1/3">

                    <span class="text-primary font-bold tracking-[0.3em] uppercase text-[10px] mb-6 block">
                        Contact
                    </span>

                    <h2 class="text-3xl lg:text-5xl font-light mb-8">
                        Let's build <span class="font-bold">something</span> great
                    </h2>

                </div>

                <div class="flex-1 space-y-6">

                    <div>
                        <p class="text-xs uppercase text-slate-500">Email</p>
                        <a href="mailto:iddarrajab@gmail.com">iddarrajab@gmail.com</a>
                    </div>

                    <div>
                        <p class="text-xs uppercase text-slate-500">Phone</p>
                        <a href="https://wa.me/62895635954974">
                            +62 895-6359-54974
                        </a>
                    </div>

                    <div>
                        <p class="text-xs uppercase text-slate-500">GitHub</p>
                        <a href="https://github.com/Iddarrajab">
                            github.com/Iddarrajab
                        </a>
                    </div>

                </div>

            </div>

        </section>


        <footer class="px-6 lg:px-24 py-10 bg-slate-900 border-t border-white/5 flex flex-col lg:flex-row gap-4 justify-between text-center lg:text-left">

            <p class="text-slate-500 text-[10px] uppercase tracking-widest">
                © 2026 Muhammad Iddar Rajab
            </p>

            <p class="text-slate-600 text-[10px] uppercase tracking-widest">
                Portfolio
            </p>

        </footer>

    </div>

</body>

</html>