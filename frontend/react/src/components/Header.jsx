import { useState } from 'react';

const links = [
  { href: "#home", label: "Home" },
  { href: "#features", label: "Features" },
  { href: "#pricing", label: "Pricing" },
  { href: "#contact", label: "Contact" },
];

export default function Header() {
  const [isOpen, setIsOpen] = useState(false);

  return (
    <header className="bg-white shadow-md px-6 py-4 flex justify-between items-center">
      <div className="text-2xl font-bold text-blue-600">YourSite</div>

      <nav className="hidden md:flex space-x-6 items-center">
        {links.map(link => (
          <a key={link.href} href={link.href} className="text-gray-700 hover:text-blue-600">
            {link.label}
          </a>
        ))}
      </nav>

      <button onClick={() => setIsOpen(!isOpen)} className="md:hidden text-gray-600 focus:outline-none">
        {isOpen ? (
          <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path strokeLinecap="round" strokeLinejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        ) : (
          <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path strokeLinecap="round" strokeLinejoin="round" d="M4 8h16M4 16h16" />
          </svg>
        )}
      </button>

      {isOpen && (
        <div className="absolute top-16 left-0 w-full bg-white shadow-md flex flex-col items-center space-y-4 py-4 md:hidden">
          {links.map(link => (
            <a key={link.href} href={link.href} className="text-gray-700 hover:text-blue-600">
              {link.label}
            </a>
          ))}
        </div>
      )}
    </header>
  );
}
