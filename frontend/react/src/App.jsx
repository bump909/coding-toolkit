import { useState } from 'react'

import './App.css'
import Header from './components/Header';
import Hero from './components/Hero';
import Features from './components/Features';
import CtaSection from './components/CtaSection';
import Footer from './components/Footer';

function App() {
  return (
    <div className="flex flex-col min-h-screen">
      <Header />
      <main className="flex-grow bg-gray-50">
        <Hero />
        <Features />
        <CtaSection />
      </main>
      <Footer />
    </div>
  );
}

export default App
