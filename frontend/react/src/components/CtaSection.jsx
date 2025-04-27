import React, { useState } from 'react';
import Modal from './Modal'; // Assuming the Modal component is in the same directory

const CtaSection = () => {
  const [isModalOpen, setIsModalOpen] = useState(false);

  const openModal = (e) => {
    e.preventDefault(); // Prevent the default link behavior
    setIsModalOpen(true);
  };

  const closeModal = () => {
    setIsModalOpen(false);
  };

  return (
    <section className="bg-blue-600 text-white py-16 text-center">
      <h2 className="text-3xl mb-6">Ready to Take Action?</h2>
      <p className="mb-8">Start your journey with us today. We’re here to help you grow and succeed.</p>
      <a
        href="#contact"
        onClick={openModal}
        className="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition"
      >
        Get Started Now
      </a>

      <Modal isOpen={isModalOpen} onClose={closeModal} />
    </section>
  );
};

export default CtaSection;
