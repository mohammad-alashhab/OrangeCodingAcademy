import React, { useState } from "react";
import { motion } from "framer-motion";
import { CheckCircle2, XCircle, AlertTriangle } from "lucide-react";

const Contact = () => {
  const [formData, setFormData] = useState({
    fname: "",
    lname: "",
    phone: "",
    email: "",
    subject: "",
    message: "",
  });

  const [errors, setErrors] = useState({});
  const [submitStatus, setSubmitStatus] = useState(null);

  // Validation functions
  const validateField = (name, value) => {
    switch (name) {
      case "fname":
      case "lname":
        return value.length >= 2 ? null : "Must be at least 2 characters";
      case "phone":
        return /^[0-9]{10}$/.test(value) ? null : "Invalid phone number";
      case "email":
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)
          ? null
          : "Invalid email address";
      case "subject":
        return value.length >= 5
          ? null
          : "Subject must be at least 5 characters";
      case "message":
        return value.length >= 10
          ? null
          : "Message must be at least 10 characters";
      default:
        return null;
    }
  };

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prev) => ({
      ...prev,
      [name]: value,
    }));

    // Validate on change
    const error = validateField(name, value);
    setErrors((prev) => ({
      ...prev,
      [name]: error,
    }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    // Validate all fields
    const newErrors = {};
    Object.keys(formData).forEach((key) => {
      const error = validateField(key, formData[key]);
      if (error) newErrors[key] = error;
    });

    // If no errors, submit form
    if (Object.keys(newErrors).length === 0) {
      // Simulate form submission
      setSubmitStatus("success");
      // You would typically send the form data to a backend here
      console.log("Form submitted:", formData);

      // Reset form after 3 seconds
      setTimeout(() => {
        setSubmitStatus(null);
        setFormData({
          fname: "",
          lname: "",
          phone: "",
          email: "",
          subject: "",
          message: "",
        });
      }, 3000);
    } else {
      setErrors(newErrors);
      setSubmitStatus("error");
    }
  };

  return (
    <div className="container mx-auto px-4 py-12">
      <motion.div
        initial={{ opacity: 0, y: 50 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{ duration: 0.5 }}
        className="rounded-2xl p-8 max-w-2xl mx-auto"
      >
        <h2 className="text-3xl font-bold mb-6 text-center text-[#fd6f00]">
          Contact <span className="text-white">Me</span>
        </h2>

        {submitStatus === "success" && (
          <motion.div
            initial={{ opacity: 0, scale: 0.8 }}
            animate={{ opacity: 1, scale: 1 }}
            className="bg-green-600/20 border border-green-600 text-green-400 p-4 rounded-lg flex items-center mb-4"
          >
            <CheckCircle2 className="mr-2" />
            Form submitted successfully!
          </motion.div>
        )}

        {submitStatus === "error" && (
          <motion.div
            initial={{ opacity: 0, scale: 0.8 }}
            animate={{ opacity: 1, scale: 1 }}
            className="bg-red-600/20 border border-red-600 text-red-400 p-4 rounded-lg flex items-center mb-4"
          >
            <XCircle className="mr-2" />
            Please correct the errors in the form.
          </motion.div>
        )}

        <form onSubmit={handleSubmit} className="space-y-4">
          <div className="grid grid-cols-2 gap-4">
            <motion.div
              initial={{ opacity: 0, x: -50 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ delay: 0.1 }}
            >
              <input
                type="text"
                name="fname"
                placeholder="First Name"
                value={formData.fname}
                onChange={handleChange}
                className={`w-full p-3 rounded-lg bg-[#121212] text-white 
                  ${
                    errors.fname
                      ? "border-2 border-red-500"
                      : "border border-[#333]"
                  }`}
              />
              {errors.fname && (
                <div className="text-red-500 text-sm mt-1 flex items-center">
                  <AlertTriangle size={16} className="mr-1" /> {errors.fname}
                </div>
              )}
            </motion.div>
            <motion.div
              initial={{ opacity: 0, x: 50 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ delay: 0.1 }}
            >
              <input
                type="text"
                name="lname"
                placeholder="Last Name"
                value={formData.lname}
                onChange={handleChange}
                className={`w-full p-3 rounded-lg bg-[#121212] text-white 
                  ${
                    errors.lname
                      ? "border-2 border-red-500"
                      : "border border-[#333]"
                  }`}
              />
              {errors.lname && (
                <div className="text-red-500 text-sm mt-1 flex items-center">
                  <AlertTriangle size={16} className="mr-1" /> {errors.lname}
                </div>
              )}
            </motion.div>
          </div>

          <div className="grid grid-cols-2 gap-4">
            <motion.div
              initial={{ opacity: 0, x: -50 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ delay: 0.2 }}
            >
              <input
                type="tel"
                name="phone"
                placeholder="Phone Number"
                value={formData.phone}
                onChange={handleChange}
                className={`w-full p-3 rounded-lg bg-[#121212] text-white 
                  ${
                    errors.phone
                      ? "border-2 border-red-500"
                      : "border border-[#333]"
                  }`}
              />
              {errors.phone && (
                <div className="text-red-500 text-sm mt-1 flex items-center">
                  <AlertTriangle size={16} className="mr-1" /> {errors.phone}
                </div>
              )}
            </motion.div>
            <motion.div
              initial={{ opacity: 0, x: 50 }}
              animate={{ opacity: 1, x: 0 }}
              transition={{ delay: 0.2 }}
            >
              <input
                type="email"
                name="email"
                placeholder="Email"
                value={formData.email}
                onChange={handleChange}
                className={`w-full p-3 rounded-lg bg-[#121212] text-white 
                  ${
                    errors.email
                      ? "border-2 border-red-500"
                      : "border border-[#333]"
                  }`}
              />
              {errors.email && (
                <div className="text-red-500 text-sm mt-1 flex items-center">
                  <AlertTriangle size={16} className="mr-1" /> {errors.email}
                </div>
              )}
            </motion.div>
          </div>

          <motion.div
            initial={{ opacity: 0, y: 50 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ delay: 0.3 }}
          >
            <input
              type="text"
              name="subject"
              placeholder="Subject"
              value={formData.subject}
              onChange={handleChange}
              className={`w-full p-3 rounded-lg bg-[#121212] text-white 
                ${
                  errors.subject
                    ? "border-2 border-red-500"
                    : "border border-[#333]"
                }`}
            />
            {errors.subject && (
              <div className="text-red-500 text-sm mt-1 flex items-center">
                <AlertTriangle size={16} className="mr-1" /> {errors.subject}
              </div>
            )}
          </motion.div>

          <motion.div
            initial={{ opacity: 0, y: 50 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ delay: 0.4 }}
          >
            <textarea
              name="message"
              placeholder="Your Message"
              value={formData.message}
              onChange={handleChange}
              className={`w-full p-3 rounded-lg bg-[#121212] text-white min-h-[150px] 
                ${
                  errors.message
                    ? "border-2 border-red-500"
                    : "border border-[#333]"
                }`}
            />
            {errors.message && (
              <div className="text-red-500 text-sm mt-1 flex items-center">
                <AlertTriangle size={16} className="mr-1" /> {errors.message}
              </div>
            )}
          </motion.div>

          <motion.div
            initial={{ opacity: 0, y: 50 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ delay: 0.5 }}
            className="flex justify-center"
          >
            <button
              type="submit"
              className="bg-[#fd6f00] hover:bg-orange-700 text-white font-bold py-3 px-8 rounded-lg transition duration-300 ease-in-out transform hover:scale-105"
            >
              Send Message
            </button>
          </motion.div>
        </form>
      </motion.div>
    </div>
  );
};

export default Contact;
