import React from "react";
import "./Skills.css";
import html from "../../assets/html.png";
import css from "../../assets/css.png";
import tailwind from "../../assets/tailwind.png";
import js from "../../assets/js.png";
import react from "../../assets/react.png";
import figma from "../../assets/figma-removebg-preview.png";
import photoshop from "../../assets/photoshop.png";
import illustrator from "../../assets/illustrator.png";


const Skills = () => {
  return (
    <div className="box-3" id="skills">
      <h2 className="h2-new">
        Ski<span className="color">lls</span>
      </h2>
      <div className="skills-items">
        <div className="item-1 skill-box">
          <img src={html} alt="html" />
          <div className="description">
            <h6>HTML-5</h6>
            <span className="bar">
              <span className="html"></span>90%
            </span>
          </div>
        </div>
        <div className="item-2 skill-box">
          <img src={css} alt="css" />
          <div className="description">
            <h6>CSS-3</h6>
            <span className="bar">
              <span className="css"></span>90%
            </span>
          </div>
        </div>
        <div className="item-3 skill-box">
          <img src={tailwind} alt="tailwind" />
          <div className="description">
            <h6>Tailwind CSS</h6>
            <span className="bar">
              <span className="tailwind"></span>25%
            </span>
          </div>
        </div>
        <div className="item-4 skill-box">
          <img src={js} alt="js" />
          <div className="description">
            <h6>JavaScript</h6>
            <span className="bar">
              <span className="js"></span>50%
            </span>
          </div>
        </div>
        <div className="item-5 skill-box">
          <img src={react} alt="react" />
          <div className="description">
            <h6>React</h6>
            <span className="bar">
              <span className="react"></span>10%
            </span>
          </div>
        </div>
        <div className="item-6 skill-box">
          <img
            src={figma}
            alt="figma"
            className="figma-img"
          />
          <div className="description">
            <h6>Figma</h6>
            <span className="bar">
              <span className="figma"></span>25%
            </span>
          </div>
        </div>
        <div className="item-7 skill-box">
          <img src={photoshop} alt="photoshop" />
          <div className="description">
            <h6>Photoshop</h6>
            <span className="bar">
              <span className="photoshop"></span>25%
            </span>
          </div>
        </div>
        <div className="item-8 skill-box">
          <img src={illustrator} alt="illustrator" />
          <div className="description">
            <h6>Illustrator</h6>
            <span className="bar">
              <span className="illustrator"></span>12.5%
            </span>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Skills;
