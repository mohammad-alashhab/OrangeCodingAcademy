import React from "react";
import "./Projects.css";

const Projects = () => {
  return (
    <div className="box-4" id="projects">
      <h2 className="h2-new">
        Pro<span className="color">jects</span>
      </h2>
      <div className="projects-items">
        <div className="item-1 projects-box bg-img-1">
          <h2>Restaurant</h2>
          <div className="icon">
            <a
              href="https://mohammad-alashhab.github.io/OrangeCodingAcademy/Landing-Page/index.html"
              className="page-link"
            >
              <i className="fa-solid fa-arrow-up-right-from-square"></i>
            </a>
          </div>
        </div>
        <div className="item-2 projects-box bg-img-2">
          <h2>Airbnb</h2>
          <div className="icon">
            <a
              href="https://mohammad-alashhab.github.io/OrangeCodingAcademy/airbnb%20-project/index.html"
              className="page-link"
            >
              <i className="fa-solid fa-arrow-up-right-from-square"></i>
            </a>
          </div>
        </div>
        <div className="item-3 projects-box bg-img-3">
          <h2>Zomato</h2>
          <div className="icon">
            <a
              href="https://mohammad-alashhab.github.io/OrangeCodingAcademy/zomato-project/index.html"
              className="page-link"
            >
              <i className="fa-solid fa-arrow-up-right-from-square"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Projects;
