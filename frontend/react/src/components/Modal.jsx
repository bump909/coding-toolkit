import React from 'react';

const Modal = ({ isOpen, onClose }) => {
  if (!isOpen) return null;

  return (
    <div className="fixed inset-0 bg-gray-800/95 flex justify-center items-center z-50">
      <div className="bg-gray-50 text-gray-800  rounded-lg p-6 shadow-lg lg:w-1/3 md:max-w-1/2 w-4/5">
        <h2 className="text-2xl mb-4">Contact Us</h2>
        <p>This is where you can put your contact form or content.</p>
        <button
          className="mt-4 bg-red-500 text-white px-4 py-2 rounded-full"
          onClick={onClose}
        >
          Close
        </button>
      </div>
    </div>
  );
};

export default Modal;
