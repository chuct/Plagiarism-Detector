using System;
using System.Threading;
using Copyleaks.SDK.API;
using Copyleaks.SDK.API.Exceptions;
using Copyleaks.SDK.API.Models;

private static void Scan(string email, string apiKey)
{
    
    const String email = "pjisrasena@ualr.edu"
    const String apiKey = "3gssiajsdifnasiluneilulq9e"
	CopyleaksCloud copyleaks = new CopyleaksCloud(eProduct.Businesses);
	CopyleaksProcess createdProcess;
	ProcessOptions scanOptions = new ProcessOptions();
	scanOptions.SandboxMode = true; 
	ResultRecord[] results;
	try
	{
		#region Login to Copyleaks cloud
		Console.Write("Login to Copyleaks cloud...");
		copyleaks.Login(email, apiKey);
		Console.WriteLine("Done!");
		
		#endregion
		
		#region Checking account balance
		
		Console.Write("Checking account balance...");
		uint creditsBalance = copyleaks.Credits;
		Console.WriteLine("Done ({0} credits)!", creditsBalance);
		if (!scanOptions.SandboxMode && creditsBalance == 0)
		{
			Console.WriteLine("ERROR: balance is {0}).", creditsBalance);
			Environment.Exit(2);
		}
		
		#endregion
		
		#region callbacks
		
		// Add a URL address to get notified, using callbacks, once the scan results are ready. 
		//Read more https://api.copyleaks.com/GeneralDocumentation/RequestHeaders#callbacks
		//scanOptions.HttpCallback = new Uri("http://callbackurl.com?pid={PID}");
		//scanOptions.InProgressResultsCallback = new Uri("http://callbackurl.com?pid={PID}");
		
		#endregion
		
		#region Submitting a new scan process to the server
		
		// Insert here the URL that you'd like to scan for plagiarism
		createdProcess = copyleaks.CreateByUrl(new Uri("http://urltoscan.com"), scanOptions);
		
		// Insert here the file that you'd like to scan for plagiarism
		//createdProcess = copyleaks.CreateByFile(new FileInfo("C:\FiletoScan.pdf"), scanOptions);
		
		Console.WriteLine("Done (PID={0})!", createdProcess.PID);
		
		#endregion
		
		#region Waiting for server's process completion
		
		// Use this if you are not using callback
		Console.Write("Scanning... ");
		ushort currentProgress;
		while (!createdProcess.IsCompleted(out currentProgress))
		{
			Console.WriteLine(currentProgress + "%");
			Thread.Sleep(5000);
		}
		Console.WriteLine("Done.");
		
		#endregion
		
		#region Processing finished. Getting results
		
		results = createdProcess.GetResults();
		if (results.Length == 0)
		{
			Console.WriteLine("No results.");
		}
		else
		{
			for (int i = 0; i < results.Length; ++i)
			{
				if (results[i].URL != null)
				{
					Console.WriteLine("Url: {0}", results[i].URL);
				}
				Console.WriteLine("Information: {0} copied words ({1}%)", results[i].NumberOfCopiedWords, results[i].Percents);
				Console.WriteLine("Comparison report: {0}", results[i].ComparisonReport);
				Console.WriteLine("Title: {0}", results[i].Title);
				Console.WriteLine("Introduction: {0}", results[i].Introduction);
				Console.WriteLine("Embeded comparison: {0}", results[i].EmbededComparison);
			}
		}
		
		#endregion
	}
	catch (UnauthorizedAccessException)
	{
		Console.WriteLine("Failed!");
		Console.WriteLine("Authentication with the server failed!");
		Console.WriteLine("Possible reasons:");
		Console.WriteLine("* You did not log in to Copyleaks cloud");
		Console.WriteLine("* Your login token has expired");
	}
	catch (CommandFailedException theError)
	{
		Console.WriteLine("Failed!");
		Console.WriteLine("*** Error {0}:", theError.CopyleaksErrorCode);
		Console.WriteLine("{0}", theError.Message);
	}
}