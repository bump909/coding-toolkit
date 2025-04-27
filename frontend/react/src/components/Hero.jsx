export default function Hero() {
  return (
    <section id="home" className="flex flex-col-reverse md:flex-row items-center justify-center px-6 py-16 max-w-6xl mx-auto">
      <div className="md:w-1/2 text-center md:text-left">
        <h1 className="text-4xl md:text-5xl font-bold mb-6">Build stunning sites faster.</h1>
        <p className="text-gray-600 mb-6">
          Kickstart your next project with ready-to-go components, flexible layouts, and pixel-perfect design.
        </p>
        <a href="#features" className="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full text-lg font-semibold transition">
          Explore Features
        </a>
      </div>
      <div className="md:w-1/2 mb-8 md:mb-0">
        <img src="https://picsum.photos/600/400?random" alt="Landing illustration" className="w-full rounded-lg shadow-lg" />
      </div>
    </section>
  );
}
