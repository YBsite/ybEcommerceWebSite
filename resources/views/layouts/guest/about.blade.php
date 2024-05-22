@extends('layouts.posts.app')
@section('content')
<section class="py-10 lg:py-20 dark:bg-gray-800">
    <div class="py-4 mx-auto lg:py-6 md:px-6">
        <div class="flex flex-wrap items-stretch">
            <div class="px-4 mb-10 lg:w-1/2 lg:mb-0">
                <div class="lg:max-w-md">
                    <div class="px-4 pl-4 mb-6 border-l-4 border-blue-500">
                        <span class="text-sm text-gray-600 uppercase dark:text-gray-400">Who we are?</span>
                        <h1 class="mt-2 text-3xl font-black text-gray-700 md:text-5xl dark:text-gray-300">
                            About Us
                        </h1>
                    </div>
                    <p class="px-4 mb-10 text-base leading-7 text-gray-500 dark:text-gray-400">
                        MVN_EN is a football news page established on May 5, 2018. It was created to share news about emerging Moroccan talents and the entire Moroccan football, from youth to Botola.
                        Since 2019, the page has also started to focus on women's football, which was very limited at the time.
                        MVN_EN is known as one of the largest Moroccan football pages when it comes to content and football news. The page has developed into a fully-fledged Moroccan news medium in the past 5 years.
                        The three of us (Abdessadek, Alaedinne, and Ali) think it is important to give attention to all Moroccan teams, and in recent years, we have interviewed several players about their career and future.
                        In addition to sharing football news, we also think about the future of Moroccan football and what it takes to develop.
                        In the coming years, as a page, we want to continue developing ourselves in all aspects.
                        MVN_EN, created by football fans, for football fans
                        MVN_EN | Home of Moroccan Football
                    </p>
                    <div class="flex items-center justify-start space-x-4 px-4">
                        <a href="https://www.facebook.com/MVNENGLISH" target="_blank" class="text-gray-500 hover:text-gray-700">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/MVN_EN?t=YBZ13gVrXDrZ5XVodBcvWg&s=09" target="_blank" class="text-gray-500 hover:text-gray-700">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/mvn.en/" target="_blank"" class="text-gray-500 hover:text-gray-700">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <!-- Add more social media icons as needed -->
                    </div>
                </div>
            </div>
            <div class="w-full px-4 mb-10 lg:w-1/2 lg:mb-0">
                <div class="h-full">
                    <img src="{{ asset('images/about.jpg') }}" alt="" class="relative z-40 object-cover w-full h-full rounded">
                </div>
            </div>
        </div>
    </div>
</section>


 
@endsection