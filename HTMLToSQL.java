import java.io.IOException;
import java.util.*;

import org.jsoup.Jsoup;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;
public class HTMLToSQL {
	public static HashSet<String> getAllPhysicsSimulationTitles()
	{
		HashSet<String> result = new HashSet<String>();
		try 
		{
			Document doc = (Document) Jsoup.connect("http://phet.colorado.edu/en/simulations/category/physics/index").get();
			Elements allPhysicsSims = doc.select("div.simulation-index").select("span");
			for(Element e: allPhysicsSims)
			{
				result.add(e.text());
//				System.out.println(e.text());
			}
			
		} 
		catch (IOException e) 
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return result;
	}
	
	public static HashSet<String> getAllBiologySimulationTitles()
	{
		HashSet<String> result = new HashSet<String>();
		try 
		{
			Document doc = (Document) Jsoup.connect("http://phet.colorado.edu/en/simulations/category/biology/index").get();
			Elements allPhysicsSims = doc.select("div.simulation-index").select("span");
			for(Element e: allPhysicsSims)
			{
				result.add(e.text());
			}
			
		} 
		catch (IOException e) 
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return result;
	}
	
	public static HashSet<String> getAllChemistrySimulationTitles()
	{
		HashSet<String> result = new HashSet<String>();
		try 
		{
			Document doc = (Document) Jsoup.connect("http://phet.colorado.edu/en/simulations/category/chemistry/index").get();
			Elements allPhysicsSims = doc.select("div.simulation-index").select("span");
			for(Element e: allPhysicsSims)
			{
//				System.out.println(e.text());
				result.add(e.text());
			}
			
		} 
		catch (IOException e) 
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return result;
	}
	
	public static HashSet<String> getAllEarthScienceSimulationTitles()
	{
		HashSet<String> result = new HashSet<String>();
		try 
		{
			Document doc = (Document) Jsoup.connect("http://phet.colorado.edu/en/simulations/category/earth-science/index").get();
			Elements allPhysicsSims = doc.select("div.simulation-index").select("span");
			for(Element e: allPhysicsSims)
			{
//				System.out.println(e.text());
				result.add(e.text());
			}
			
		} 
		catch (IOException e) 
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return result;
	}
	
	public static HashSet<String> getAllMathSimulationTitles()
	{
		HashSet<String> result = new HashSet<String>();
		try 
		{
			Document doc = (Document) Jsoup.connect("http://phet.colorado.edu/en/simulations/category/math/index").get();
			Elements allPhysicsSims = doc.select("div.simulation-index").select("span");
			for(Element e: allPhysicsSims)
			{
//				System.out.println(e.text());
				result.add(e.text());
			}
			
		} 
		catch (IOException e) 
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return result;
	}
	
	public static HashSet<String> getAllElementarySchoolSimulationTitles()
	{
		HashSet<String> result = new HashSet<String>();
		try 
		{
			Document doc = (Document) Jsoup.connect("http://phet.colorado.edu/en/simulations/category/by-level/elementary-school/index").get();
			Elements allPhysicsSims = doc.select("div.simulation-index").select("span");
			for(Element e: allPhysicsSims)
			{
//				System.out.println(e.text());
				result.add(e.text());
			}
			
		} 
		catch (IOException e) 
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return result;
	}
	
	public static HashSet<String> getAllMiddleSchoolSimulationTitles()
	{
		HashSet<String> result = new HashSet<String>();
		try 
		{
			Document doc = (Document) Jsoup.connect("http://phet.colorado.edu/en/simulations/category/by-level/middle-school/index").get();
			Elements allPhysicsSims = doc.select("div.simulation-index").select("span");
			for(Element e: allPhysicsSims)
			{
//				System.out.println(e.text());
				result.add(e.text());
			}
			
		} 
		catch (IOException e) 
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return result;
	}
	
	public static HashSet<String> getAllHighSchoolSimulationTitles()
	{
		HashSet<String> result = new HashSet<String>();
		try 
		{
			Document doc = (Document) Jsoup.connect("http://phet.colorado.edu/en/simulations/category/by-level/high-school/index").get();
			Elements allPhysicsSims = doc.select("div.simulation-index").select("span");
			for(Element e: allPhysicsSims)
			{
//				System.out.println(e.text());
				result.add(e.text());
			}
			
		} 
		catch (IOException e) 
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return result;
	}
	
	public static HashSet<String> getAllUniversitySimulationTitles()
	{
		HashSet<String> result = new HashSet<String>();
		try 
		{
			Document doc = (Document) Jsoup.connect("http://phet.colorado.edu/en/simulations/category/by-level/university/index").get();
			Elements allPhysicsSims = doc.select("div.simulation-index").select("span");
			for(Element e: allPhysicsSims)
			{
//				System.out.println(e.text());
				result.add(e.text());
			}
			
		} 
		catch (IOException e) 
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return result;
	}
	public static ArrayList<String> getAllCategoriesForSimulation(String simulationTitle)
	{
		ArrayList<String> result = new ArrayList<String>();
		if(getAllPhysicsSimulationTitles().contains(simulationTitle)) result.add("Physics");
		if(getAllBiologySimulationTitles().contains(simulationTitle)) result.add("Biology");
		if(getAllChemistrySimulationTitles().contains(simulationTitle)) result.add("Chemistry");
		if(getAllEarthScienceSimulationTitles().contains(simulationTitle)) result.add("Earth Science");
		if(getAllMathSimulationTitles().contains(simulationTitle)) result.add("Math");
		return result;
	}
	
	public static ArrayList<String> getEducationLevelForSimulation(String simulationTitle)
	{
		ArrayList<String> result = new ArrayList<String>();
		if(getAllElementarySchoolSimulationTitles().contains(simulationTitle))
		{
			result.add("k");
			result.add("1");
			result.add("2");
			result.add("3");
			result.add("4");
			result.add("5");
		}
		if(getAllMiddleSchoolSimulationTitles().contains(simulationTitle))
		{
			result.add("6");
			result.add("7");
			result.add("8");
		}
		if(getAllHighSchoolSimulationTitles().contains(simulationTitle))
		{
			result.add("9");
			result.add("10");
			result.add("11");
			result.add("12");
		}
		return result;
	}
	
	public static String getDescriptionOfSimulation(String linkToSimulation)
	{
		try 
		{
			Document doc = (Document) Jsoup.connect(linkToSimulation).get();
			Elements allPhysicsSims = doc.select("head").select("meta");
			for(Element e: allPhysicsSims)
			{
				if(e.attr("name").equals("description")) return e.attr("content");
			}
		} 
		catch (IOException e) 
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return "";
	}
	
	public static String getLinkToLessonImage(String linkToSimulation)
	{
		try 
		{
			Document doc = (Document) Jsoup.connect(linkToSimulation).get();
			Elements allPhysicsSims = doc.select("img.simulation-main-screenshot");
			for(Element e: allPhysicsSims)
			{
				return "http://phet.colorado.edu"+e.attr("src");
			}
		} 
		catch (IOException e) 
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return "";
	}
	
	public static ArrayList<String> getAllAuthors(String linkToSimulation)
	{
		ArrayList<String> result = new ArrayList<String>();
		try 
		{
			Document doc = (Document) Jsoup.connect(linkToSimulation).get();
			Elements allPhysicsSims = doc.select("table.credits-table").select("span");
			for(Element e: allPhysicsSims)
			{
//				System.out.println(e.text());
				result.add(e.text());
			}
		} 
		catch (IOException e) 
		{
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return result;
	}
	
	public static void main(String[] args)
	{
//		getAllPhysicsSimulationTitles();
//		getAllBiologySimulationTitles();
//		getAllChemistrySimulationTitles();
//		getAllEarthScienceSimulationTitles();
//		getAllMathSimulationTitles();
//		getAllElementarySchoolSimulationTitles();
//		getAllMiddleSchoolSimulationTitles();
//		getAllHighSchoolSimulationTitles();
//		getAllUniversitySimulationTitles();
//		getDescriptionOfSimulation("http://phet.colorado.edu/en/simulation/acid-base-solutions");
//		System.out.println(getLinkToLessonImage("http://phet.colorado.edu/en/simulation/acid-base-solutions"));
//		getAllAuthors("http://phet.colorado.edu/en/simulation/acid-base-solutions");
	}
}
