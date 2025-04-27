export default function Features() {
  return (
    <section id="features" className="px-6 py-16 bg-white">
      <div className="text-center mb-12">
        <h2 className="text-3xl md:text-4xl font-bold">Features You'll Love</h2>
        <p className="text-gray-600 mt-4">Everything you need to build modern, responsive sites quickly.</p>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-3 gap-12 max-w-6xl mx-auto">
        {[
          { title: "Responsive Design", description: "Mobile-first layouts that work beautifully on any device." },
          { title: "Reusable Components", description: "Pre-built sections and components to speed up development." },
          { title: "Easy Customization", description: "Tweak colors, layouts, and typography with Tailwind." }
        ].map((feature, index) => (
          <div key={index} className="bg-gray-100 p-8 rounded-lg shadow hover:shadow-lg transition">
            <h3 className="text-xl font-semibold mb-4">{feature.title}</h3>
            <p className="text-gray-600">{feature.description}</p>
          </div>
        ))}
      </div>
    </section>
  );
}
